<?php

namespace App\Services\Page\Setting;

use App\Contracts\Models;
use App\Traits\ViewChecker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 
class ProfileService
{
    use ViewChecker;

    /**
     * @var userInterface
     */
    private $userInterface;

    /**
     * @var companyInterface
     */
    private $companyInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\UserInterface $userInterface
     * @param App\Contracts\Models\CompanyInterface $companyInterface
     */
    public function __construct(Models\UserInterface $userInterface, Models\CompanyInterface $companyInterface)
    {
        $this->userInterface = $userInterface;
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
            $auth = request()->user();

            return [
                'user' => $auth,
                'company' => $this->companyInterface->findById($auth->company)
            ];
        }
    }

    /**
     * Update function.
     * 
     * @param Illuminate\Http\Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        $data = $request->validated();

        if ($request->has('form_pw')) {
            if (Hash::check($data['old_password'], request()->user()->password)) {
                $this->userInterface->update($id, ['password' => $data['password']]);
                
                return toastr()->success('Kata sandi berhasil diupdate', 'Profile');
            } else {
                return toastr()->success('Kata sandi lama tidak valid', 'Profile');
            }
        } elseif ($request->has('form_user')) {
            $this->userInterface->update($id, $data);

            return toastr()->success('Profile berhasil diupdate', 'Profile');
        }
    }
}