<?php

namespace App\Http\Controllers;

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
        $detail = json_decode($dataTypeContent->order_detail);

        $orderDetail = [
            'Jumlah Titik Bordir'       => $detail->embroidery_point,
            'Catatan Bordir'            => $detail->embroidery_notes,
            'Jenis Sablon'              => $detail->screen_printing,
            'Catatan Sablon'            => $detail->screen_printing_notes,
            'Jenis Kancing'             => $detail->button,
            'Menggunakan Perepet'       => $detail->use_perepet,
            'Jenis Tali Kur'            => $detail->kur_rope,
            'Jenis Stoper'              => $detail->stopper,
            'Jenis Resleting'           => $detail->zipper,
            'Jenis Puring'              => $detail->puring,
        ];

        if ($dataTypeContent->type == 'JACKET') {
            $orderDetail['Jenis Jaket'] = $detail->jacket_type;
        }

        $resultOrderDetail = [];

        foreach ($orderDetail as $k => $v) {
            $resultOrderDetail[] = "$k: $v";
        }

        $dataTypeContent->order_detail = join(', ', $resultOrderDetail);

        $details = json_decode($dataTypeContent->detail);
        $resultDetails = [];
        foreach ($details as $v) {
            $resultDetails[] = "{$v->size} {$v->type} ({$v->quantity})";
        }

        $dataTypeContent->detail = join(', ', $resultDetails);

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
}
