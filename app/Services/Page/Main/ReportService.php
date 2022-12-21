<?php

namespace App\Services\Page\Main;

use App\Contracts\Models;
use App\Traits\ViewChecker;
use App\Traits\ChartConvert;

class ReportService
{
    use ViewChecker, ChartConvert;

    /**
     * @var farmInterface
     */
    private $farmInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\FarmInterface $farmInterface
     */
    public function __construct(Models\FarmInterface $farmInterface)
    {
        $this->farmInterface = $farmInterface;
    }

    /**
     * Index function.
     * 
     * @param $path
     */
    public function index($path)
    {
        if ($this->checkView($path)) {
            $company = request()->user()->company;
            
            return [
                'chart_weight' => $this->selectTableData('farm_datas', $company, "weight", "birthday"),
                'chart_height' => $this->selectTableData('farm_datas', $company, "height", "birthday"),
                'chart_lenght' => $this->selectTableData('farm_datas', $company, "lenght", "birthday"),

                'farms' => $this->farmInterface->all(['*'], [], [['company', $company]])
            ];
        }
    }
}