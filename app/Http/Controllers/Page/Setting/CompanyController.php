<?php

namespace App\Http\Controllers\Page\Setting;

use App\Http\Controllers\Controller;
use App\Services\Page\Setting\CompanyService;
use App\Http\Requests\Page\Setting\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Locate blade file
     *
     * @return string
     */
    private static $path = 'pages.setting.company';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanyService $service)
    {
        return view(static::$path, $service->index(static::$path));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, CompanyService $service, $id)
    {
        if ($request->validated()) {
            $service->update($request->validated(), $id);
    
            return redirect(route("farm.index"));
        } else {
            return back();
        }
    }
}