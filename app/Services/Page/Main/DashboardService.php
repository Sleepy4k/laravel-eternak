<?php

namespace App\Services\Page\Main;

use App\Traits\ViewChecker;
use App\Traits\ChartConvert;
 
class DashboardService
{
    use ViewChecker, ChartConvert;

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
                'chart_total' => $this->getTableData('farm_datas', $company, 'birthday'),
                'chart_jantan' => $this->getTableData('farm_datas', $company, 'birthday', ['gender', 'jantan']),
                'chart_betina' => $this->getTableData('farm_datas', $company, 'birthday', ['gender', 'betina']),
                'chart_hidup' => $this->getTableData('farm_datas', $company, 'birthday', ['status', 'hidup']),
                'chart_mati' => $this->getTableData('farm_datas', $company, 'birthday', ['status', 'mati']),
                'chart_hilang' => $this->getTableData('farm_datas', $company, 'birthday', ['status', 'hilang']),
                'chart_terjual' => $this->getTableData('farm_datas', $company, 'birthday', ['status', 'terjual']),
                'chart_weight' => $this->selectTableData('farm_datas', $company, "weight", "birthday"),
                'chart_height' => $this->selectTableData('farm_datas', $company, "height", "birthday"),
                'chart_lenght' => $this->selectTableData('farm_datas', $company, "lenght", "birthday")
            ];
        }
    }
}