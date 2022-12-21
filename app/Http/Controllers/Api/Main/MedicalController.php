<?php

namespace App\Http\Controllers\Api\Main;

use App\Traits\ApiRespons;
use App\Http\Controllers\Controller;
use App\Services\Api\Main\MedicalService;

class MedicalController extends Controller
{
    use ApiRespons;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MedicalService $service, $id)
    {
        return $service->index($id);
    }
}