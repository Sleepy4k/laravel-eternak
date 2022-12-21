<?php

namespace App\Services\Page\Auth;

use App\Contracts\Models;
use App\Traits\ViewChecker;

class RegisterService
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
        return $this->checkView($path);
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        $company = $this->companyInterface->create([
            'name' => $request['company'],
            'email' => $request['email']
        ]);

        $this->userInterface->create([
            'username' => $request['username'],
            'email' => $request['email'],
            'company' => $company->id,
            'whatsapp_number' => $request['whatsapp_number'],
            'password' => $request['password'],
        ]);

        activity("register")->withProperties([
            "username" => $request['username'],
            "email" => $request['email'],
            "whatsapp" => $request['whatsapp_number'],
            "company name" => $request['company']
        ])->log('Akun '.$request['username'].' berhasil di daftarkan');

        return toastr()->success($request['username'].' berhasil di daftarkan', 'Auth');
    }
}