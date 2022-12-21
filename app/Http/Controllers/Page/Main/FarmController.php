<?php

namespace App\Http\Controllers\Page\Main;

use App\Http\Controllers\Controller;
use App\DataTables\Main\FarmDataTable;
use App\Services\Page\Main\FarmService;
use App\Http\Requests\Page\Main\FarmRequest;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class FarmController extends Controller
{
    /**
     * Locate blade file
     *
     * @return string
     */
    private static $path = 'pages.main.farm';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FarmService $service, FarmDataTable $dataTable)
    {
        return $dataTable->render(static::$path, $service->index(static::$path));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FarmRequest $request, FarmService $service)
    {
        if ($request->validated()) {
            $service->store($request->validated());
    
            return redirect(route('livestock.index'));
        } else {
            return back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(FarmService $service, $id)
    {
        return view(static::$path, $service->show(static::$path, $id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FarmService $service, $id)
    {
        return view(static::$path, $service->edit(static::$path, $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FarmRequest $request, FarmService $service, $id)
    {
        if ($request->validated()) {
            $service->update($request->validated(), $id);
    
            return redirect(route('livestock.index'));
        } else {
            return back();
        }
    }
}