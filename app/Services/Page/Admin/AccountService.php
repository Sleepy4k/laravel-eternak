<?php

namespace App\Services\Page\Admin;

use App\Contracts\Models;
use App\Traits\ViewChecker;
 
class AccountService
{
    use ViewChecker;

    /**
     * @var userInterface
     */
    private $userInterface;
    
    /**
     * @var roleInterface
     */
    private $roleInterface;
    
    /**
     * @var companyInterface
     */
    private $companyInterface;
    
    /**
     * @var categoryInterface
     */
    private $categoryInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\UserInterface $userInterface
     * @param App\Contracts\Models\RoleInterface $roleInterface
     * @param App\Contracts\Models\CompanyInterface $companyInterface
     * @param App\Contracts\Models\CategoryInterface $categoryInterface
     */
    public function __construct(Models\UserInterface $userInterface, Models\RoleInterface $roleInterface, Models\CompanyInterface $companyInterface, Models\CategoryInterface $categoryInterface)
    {
        $this->userInterface = $userInterface;
        $this->roleInterface = $roleInterface;
        $this->companyInterface = $companyInterface;
        $this->categoryInterface = $categoryInterface;
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
                'roles' => $this->roleInterface->all(),
                'companies' => $this->companyInterface->all()
            ];
        }
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        $this->userInterface->create($request);

        return toastr()->success('Akun berhasil dibuat', 'Akun');
    }

    /**
     * Edit function.
     * 
     * @param $path
     * @param $id
     */
    public function edit($path, $id)
    {
        if ($this->checkView($path)) {
            return [
                'roles' => $this->roleInterface->all(),
                'user' => $this->userInterface->findById($id),
                'companies' => $this->companyInterface->all(),
                'categories' => $this->categoryInterface->all()
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
        $this->userInterface->update($id, $request);

        return toastr()->success('Akun berhasil diupdate', 'Akun');
    }

    /**
     * Destroy function.
     * 
     * @param $id
     */
    public function destroy($id)
    {
        $this->userInterface->deleteById($id);

        return toastr()->success('Akun berhasil di hapus', 'Akun');
    }
}