<?php

namespace App\Http\Controllers;

use App\Helper\RequestHelper;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class RequestController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        switch ($request->category) {
            case ModelsRequest::CATEGORY_PURCHASE:
                $code = RequestHelper::generatePurchaseRequestCode();
                break;
            case ModelsRequest::CATEGORY_EXPENDITURE:
                $code = RequestHelper::generateExpenditureRequestCode();
                break;
            case ModelsRequest::CATEGORY_PAYROLL:
                $code = RequestHelper::generatePayrollRequestCode();
                break;
            default:
                $code = NULL;      
        } 

        $request->merge([
            'code'          => $code,
            'total_price'   => ($request->quantity ?? 0) * ($request->price_per_item)
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
