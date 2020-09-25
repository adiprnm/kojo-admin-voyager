<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class RequestController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $request->merge([
            'total_price' => ($request->quantity ?? 0) * ($request->price_per_item)
        ]);

        return parent::store($request);
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'total_price' => ($request->quantity ?? 0) * ($request->price_per_item)
        ]);

        return parent::update($request, $id);
    }
}
