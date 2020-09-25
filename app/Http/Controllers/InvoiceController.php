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
