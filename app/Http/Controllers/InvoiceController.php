<?php

namespace App\Http\Controllers;

use App\Models\CashReceipt;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class InvoiceController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $total = 0;
        $price = 0;

        foreach ($request->detail as $detail) {
            $total += $detail['quantity'];
            $price += ($detail['quantity'] * ($detail['price'] ?? 0));
        }

        $data = [
            'order_code'    => Order::where('id', $request->order_id)->first()->order_code,
            'code'          => generateInvoiceCode(),
            'total'         => $total,
            'price'         => $price,
            'total_price'   => $price + $request->delivery_fee,
            'detail'        => json_encode($request->detail)
        ];

        $request->merge($data);

        return parent::store($request);
    }

    public function update(Request $request, $id)
    {
        $total = 0;
        $price = 0;

        foreach ($request->detail as $detail) {
            $total += $detail['quantity'];
            $price += ($detail['quantity'] * ($detail['price'] ?? 0));
        }

        $data = [
            'total'         => $total,
            'price'         => $price,
            'total_price'   => $price + $request->delivery_fee,
            'detail'        => json_encode($request->detail)
        ];

        $request->merge($data);

        return parent::update($request, $id);
    }

    public function show(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $isSoftDeleted = false;

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $model = $model->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $model = $model->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$model, 'findOrFail'], $id);
            if ($dataTypeContent->deleted_at) {
                $isSoftDeleted = true;
            }
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        $dataTypeContent->detail = json_decode($dataTypeContent->detail);
        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'read');

        // Check permission
        $this->authorize('read', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'read', $isModelTranslatable);

        $view = 'voyager::bread.read';

        if (view()->exists("voyager::$slug.read")) {
            $view = "voyager::$slug.read";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'isSoftDeleted'));
    }

    public function download($id)
    {
        $invoice = Invoice::where('id', $id)->first();

        $invoice->detail = json_decode($invoice->detail);

        $receipts = CashReceipt::where('order_id', $invoice->order_id)->get();
        $totalAmount = 0;

        foreach ($receipts as $receipt) {
            $totalAmount += $receipt->amount;
        }

        $invoice->remaining = $invoice->total_price - $totalAmount;

        // return view('invoice/index', compact('invoice'));
        $view = View::make('invoice.index', compact('invoice'))->render();


        // echo $view;die;
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($view, 'utf-8');
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream("{$invoice->code}.pdf");
    }
}
