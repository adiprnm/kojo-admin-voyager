<?php

namespace App\Http\Controllers;

use App\Helper\DisbursementHelper;
use App\Models\Order;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class CashDisbursementController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $requestDocument = ModelsRequest::where('id', $request->request_id)->first();
        $order = Order::where('id', $requestDocument->order_id)->first();

        $splitted = explode('-', $requestDocument->code);

        $request->merge([
            'code' => DisbursementHelper::generateCashDisbursementCode($splitted[0], $order->order_ref)
        ]);

        return parent::store($request);
    }
}
