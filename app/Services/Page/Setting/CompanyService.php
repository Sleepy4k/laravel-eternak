<?php

namespace App\Services\Page\Setting;

use App\Contracts\Models;
use App\Traits\ViewChecker;
 
class CompanyService
{
    use ViewChecker;

    /**
     * @var companyInterface
     */
    private $companyInterface;
    
    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\CompanyInterface $companyInterface
     */
    public function __construct(Models\CompanyInterface $companyInterface)
    {
        $this->companyInterface = $companyInterface;
    }

    /**
     * Index function.
     * 
     * @param $path
     */
    public function index($path)
    {
        if ($this->checkView($path)) {
            return [
                'company' => $this->companyInterface->findById(request()->user()->company)
            ];
        }
    }

    /**
     * Update function.
     * 
     * @param $request
     * @param $id
     */
    public function update($request, $id)
    {
        $this->companyInterface->update($id, $request);

        return toastr()->success('Peternakan berhasil diupdate', 'Peternakan');
    }
}