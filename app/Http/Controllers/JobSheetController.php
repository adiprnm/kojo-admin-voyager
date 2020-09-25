<?php

namespace App\Http\Controllers;

use App\Helper\JobSheetHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class JobSheetController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        Order::where('id', $request->order_id)->update([
            'status' => $request->status
        ]);
        
        $request->merge([
            'code' => JobSheetHelper::generateCode($request->batch)
        ]);

        return parent::store($request);
    }

    public function update(Request $request, $id)
    {
        Order::where('id', $request->order_id)->update([
            'status' => $request->status
        ]);

        return parent::update($request, $id);
    }
}
