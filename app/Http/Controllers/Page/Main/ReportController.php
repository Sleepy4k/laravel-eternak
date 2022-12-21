<?php

namespace App\Http\Controllers\Page\Main;

use App\Http\Controllers\Controller;
use App\Services\Page\Main\ReportService;

class ReportController extends Controller
{
    /**
     * Locate blade file
     *
     * @return string
     */
    private static $path = 'pages.main.report';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReportService $service)
    {
        return view(static::$path, $service->index(static::$path));
    }
}