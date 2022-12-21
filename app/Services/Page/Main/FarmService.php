<?php

namespace App\Services\Page\Main;

use App\Contracts\Models;
use App\Traits\ViewChecker;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class FarmService
{
    use ViewChecker;

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
            return [
                'fathers' => $this->farmInterface->all(['*'], [], [['gender', 'jantan'], ['company', request()->user()->company]]),
                'mothers' => $this->farmInterface->all(['*'], [], [['gender', 'betina'], ['company', request()->user()->company]]),
                'genders' => config('enum.farm.gender')
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
        $this->farmInterface->create($request);
 
        return toastr()->success('Data ternak berhasil di tambahkan', 'Farm');
    }

    /**
     * Show function.
     * 
     * @param $path
     * @param $id
     */
    public function show($path, $id)
    {
        if ($this->checkView($path)) {
            if (!file_exists(public_path('images/qrcode/qrcode_'.$id.'.png'))) {
                QrCode::size(250)->generate(route('landing.qrcode', $id), public_path('images/qrcode/qrcode_'.$id.'.png'));
            }

            return [
                'qrcode' => QrCode::size(250)->generate(route('landing.qrcode', $id)),
                'farm' => $this->farmInterface->findByCustomId([['register_number', $id]])
            ];
        }
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
                'farm' => $this->farmInterface->findById($id),
                'fathers' => $this->farmInterface->all(['*'], [], [['gender', 'jantan'], ['id', '!=', $id], ['company', request()->user()->company]]),
                'mothers' => $this->farmInterface->all(['*'], [], [['gender', 'betina'], ['id', '!=', $id], ['company', request()->user()->company]]),
                'genders' => config('enum.farm.gender'),
                'statuses' => config('enum.farm.status')
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
        $this->farmInterface->update($id, $request);

        return toastr()->success('Data ternak berhasil di ubah', 'Farm');
    }
}