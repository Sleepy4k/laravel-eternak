<?php

namespace App\Services\Page;

use App\Imports;;
use App\Contracts\Models;
use App\Traits\ViewChecker;
use App\Traits\ChartConvert;
use App\Exports\TemplateExport;
use Maatwebsite\Excel\Facades\Excel;

class WelcomeService
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

    public function index($path)
    {
        return $this->checkView($path);
    }

    public function update($data)
    {
        return session()->put("lang_code", $data);
    }

    public function show($path, $id)
    {
        if ($this->checkView($path)) {
            return [
                'farm' => $this->farminterface->getAllData()->where('register_number', $id)->firstOrFail()
            ];
        }
    }

    public function import($request, $category)
    {
        try {
            $result = null;

            switch ($category) {
                case 'farm':
                    $result = Excel::import(new Imports\Main\FarmDataImport, $request['import_file']);
                    break;
                case 'medical':
                    $result = Excel::import(new Imports\Main\MedicalRecordImport($request['livestock_id']), $request['import_file']);
                    break;
                case 'account':
                    $result = Excel::import(new Imports\Setting\AccountImport, $request['import_file']);
                    break;
                case 'account-admin':
                    $result = Excel::import(new Imports\System\AccountImport, $request['import_file']);
                    break;
                case 'role':
                    $result = Excel::import(new Imports\System\RoleImport, $request['import_file']);
                    break;
                case 'category':
                    $result = Excel::import(new Imports\System\CategoryImport, $request['import_file']);
                    break;
                case 'menu':
                    $result = Excel::import(new Imports\System\MenuImport, $request['import_file']);
                    break;
                case 'page':
                    $result = Excel::import(new Imports\System\PageImport, $request['import_file']);
                    break;
                default:
                    $result = Excel::import(new Imports\Main\FarmDataImport, $request['import_file']);
                    break;
            }

            return $result;
        } catch (\Throwable $th) {
            abort(500, $th->getMessage());
        }
    }

    public function export($category)
    {
        try {
            return Excel::download(new TemplateExport($category), ucfirst($category).'_'.date('YmdHis').'.xlsx');
        } catch (\Throwable $th) {
            abort(500, $th->getMessage());
        }
    }
    
    public function dashboard($path, $id)
    {
        if ($this->checkView($path)) {
            return [
                'chart_total' => $this->getTableData('farm_datas', $id, 'birthday'),
                'chart_hidup' => $this->getTableData('farm_datas', $id, 'birthday', ['status', 'hidup']),
                'chart_mati' => $this->getTableData('farm_datas', $id, 'birthday', ['status', 'mati']),
                'chart_hilang' => $this->getTableData('farm_datas', $id, 'birthday', ['status', 'hilang']),
                'chart_terjual' => $this->getTableData('farm_datas', $id, 'birthday', ['status', 'terjual']),
                'farms' => $this->farminterface->getAllData()->where('company', $id)
            ];
        }
    }
}