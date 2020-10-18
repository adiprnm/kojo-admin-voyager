<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class NewsController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $request->merge([
            'slug'          => Str::slug($request->title),
            'published_at'  => strtolower($request->status) == 'published' ? date("Y-m-d H:i:s") : NULL
        ]);

        return parent::store($request);
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'published_at'  => strtolower($request->status) == 'published' ? date("Y-m-d H:i:s") : NULL
        ]);

        return parent::update($request, $id);
    }
}
