<?php

namespace App\Http\Controllers\Api\Main;

use App\Traits\ApiRespons;
use App\Http\Controllers\Controller;
use App\Services\Api\Main\FarmDataService;
use App\Http\Requests\Api\Main\FarmDataRequest;

class FarmDataController extends Controller
{
    use ApiRespons;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FarmDataService $service)
    {
        return $service->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FarmDataRequest $request, FarmDataService $service)
    {
        return $service->store($request->validated());
    }
}