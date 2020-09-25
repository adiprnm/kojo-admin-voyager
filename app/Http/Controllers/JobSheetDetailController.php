<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class JobSheetDetailController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        Order::where('id', $request->order_id)->update([
            'status' => $request->status
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
