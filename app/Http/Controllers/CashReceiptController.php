<?php

namespace App\Http\Controllers;

use App\Helper\ReceiptHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class CashReceiptController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $order = Order::where('id', $request->order_id)->first();
        
        $request->merge([
            'code' => ReceiptHelper::generateCashReceiptCode($request->type ?? '',
                                                             $request->receipt_for ?? '',
                                                             $order->order_ref)
        ]);

        return parent::store($request);
    }
}
