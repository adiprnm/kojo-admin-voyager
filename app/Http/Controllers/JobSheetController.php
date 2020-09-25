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
        $request->merge([
            'code' => JobSheetHelper::generateCode($request->batch)
        ]);

        return parent::store($request);
    }
}
