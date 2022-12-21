<?php

namespace App\Services\Page\Setting;

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
     * Account service constructor.
     * 
     * @param App\Contracts\Models\UserInterface $userInterface
     */
    public function __construct(Models\UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Index function.
     * 
     * @param $path
     */
    public function index($path)
    {
        return $this->checkView($path);
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
                'user' => $this->userInterface->finById($id)
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

        return toastr()->success('Akun berhasil dihapus', 'Akun');
    }
}