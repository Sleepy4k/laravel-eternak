<?php

namespace App\Http\Controllers\Page\Main;

use App\Http\Controllers\Controller;
use App\DataTables\Main\MedicalDataTable;
use App\Services\Page\Main\MedicalService;
use App\Http\Requests\Page\Main\MedicalRequest;

class MedicalController extends Controller
{
    /**
     * Locate blade file
     *
     * @return string
     */
    private static $path = 'pages.main.medical';

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicalRequest $request, MedicalService $service)
    {
        if ($request->validated()) {
            $service->store($request->validated());
    
            return redirect(route('medical.show', $request->livestock_id));
        } else {
            return back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalService $service, MedicalDataTable $dataTable, $id)
    {
        return $dataTable->render(static::$path, $service->show(static::$path, $id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalService $service, $id)
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
    public function update(MedicalRequest $request, MedicalService $service, $id)
    {
        if ($request->validated()) {
            $service->update($request->validated(), $id);
            
            return redirect(route('medical.show', $request->livestock_id));
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalService $service, $id)
    {
        $service->destroy($id);

        return redirect()->back();
    }
}