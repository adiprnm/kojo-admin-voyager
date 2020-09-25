<?php

namespace App\Http\Controllers;

use App\Helper\OrderHelper;
use App\Models\ClothingButton;
use App\Models\ClothingJacketType;
use App\Models\ClothingKurRope;
use App\Models\ClothingMaterial;
use App\Models\ClothingPuring;
use App\Models\ClothingScreenPrinting;
use App\Models\ClothingStopper;
use App\Models\ClothingType;
use App\Models\ClothingZipper;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class OrderController extends VoyagerBaseController
{
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

        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);
        $orderDetail = json_decode($dataTypeContent->order_detail);
        $orderDetail->screen_printing = ClothingScreenPrinting::where('code', $orderDetail->screen_printing)->first()->name ?? '-';
        $orderDetail->button = ClothingButton::where('code', $orderDetail->button)->first()->name ?? '-';
        $orderDetail->kur_rope = ClothingKurRope::where('code', $orderDetail->kur_rope)->first()->name ?? '-';
        $orderDetail->stopper = ClothingStopper::where('code', $orderDetail->stopper)->first()->name ?? '-';
        $orderDetail->zipper = ClothingZipper::where('code', $orderDetail->zipper)->first()->name ?? '-';
        $orderDetail->puring = ClothingPuring::where('code', $orderDetail->puring)->first()->name ?? '-';
        
        if (isset($orderDetail->jacket_type)) {
            $orderDetail->jacket_type = ClothingJacketType::where('code', $orderDetail->jacket_type)->first()->name ?? '-';
        }

        $dataTypeContent->order_detail = $orderDetail;
        $dataTypeContent->detail = json_decode($dataTypeContent->detail);
        
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

    public function edit(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

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
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        $dataTypeContent->order_detail = json_decode($dataTypeContent->order_detail);
        $dataTypeContent->detail = json_decode($dataTypeContent->detail);

        $screenPrintings = ClothingScreenPrinting::all();
        $buttons = ClothingButton::all();
        $kurRopes = ClothingKurRope::all();
        $stoppers = ClothingStopper::all();
        $zippers = ClothingZipper::all();
        $purings = ClothingPuring::all();
        $jacketTypes = ClothingJacketType::all();

        foreach ($dataType->editRows as $key => $row) {
            $dataType->editRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'edit', $isModelTranslatable);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'screenPrintings', 'buttons', 'kurRopes', 'stoppers', 'zippers', 'purings', 'jacketTypes'));
    }

    public function update(Request $request, $id)
    {
        $total = 0;
        foreach ($request->detail as $detail) {
            $total += $detail['quantity'];
        }

        $request->merge([
            'order_detail' => json_encode($request->order_detail),
            'detail' => json_encode($request->detail),
            'total'         => $total
        ]);

        return parent::update($request, $id);
    }

    public function retrieve($id)
    {
        $order = Order::where('id', $id)->first();

        $order->detail = json_decode($order->detail);
        $order->order_detail = json_decode($order->order_detail);
        $order->order_time = date("Y-m-d", strtotime($order->order_time));
        $order->type = ClothingType::where('code', $order->type)->first()->name;
        $order->material = ClothingMaterial::where('code', $order->material)->first()->name;
        
        if ($order->completed_time) {
            $order->completed_time = date("Y-m-d", strtotime($order->completed_time));
        }

        return response()->json($order);
    }

    public function create(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
                            ? new $dataType->model_name()
                            : false;

        $screenPrintings = ClothingScreenPrinting::all();
        $buttons = ClothingButton::all();
        $kurRopes = ClothingKurRope::all();
        $stoppers = ClothingStopper::all();
        $zippers = ClothingZipper::all();
        $purings = ClothingPuring::all();
        $jacketTypes = ClothingJacketType::all();

        foreach ($dataType->addRows as $key => $row) {
            $dataType->addRows[$key]['col_width'] = $row->details->width ?? 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'add', $isModelTranslatable);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'screenPrintings', 'buttons', 'kurRopes', 'stoppers', 'zippers', 'purings', 'jacketTypes'));
    }

    public function store(Request $request)
    {
        $total = 0;
        foreach ($request->detail as $detail) {
            $total += $detail['quantity'];
        }

        $type = ClothingType::where('code', $request->type)->first()->name;
        $material = ClothingMaterial::where('code', $request->material)->first()->name;

        $request->merge([
            'order_ref'     => OrderHelper::generateOrderRef(),
            'order_code'    => generateOrderCode(),
            'order_name'    => "$type $material - {$request->name} - {$request->phone_number}",
            'detail'        => json_encode($request->detail),
            'order_detail'  => json_encode($request->order_detail),
            'order_time'    => date("Y-m-d H:i:s", strtotime($request->order_time)),
            'total'         => $total,
            'address'       => "{$request->address_street} Kelurahan {$request->address_village} Kecamatan {$request->address_kecamatan}, {$request->address_city} {$request->address_postal_code}"
        ]);

        return parent::store($request);
    }
}
