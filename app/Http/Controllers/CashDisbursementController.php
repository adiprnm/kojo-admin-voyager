<?php

namespace App\Http\Controllers;

use App\Helper\DisbursementHelper;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class CashDisbursementController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $requestDocument = ModelsRequest::where('id', $request->request_id)->first();
        $splitted = explode('-', $requestDocument->code);

        $request->merge([
            'code' => DisbursementHelper::generateCashDisbursementCode($splitted[0])
        ]);

        return parent::store($request);
    }
}
