<?php

namespace App\Services\Page\Main;

use App\Contracts\Models;
use App\Traits\ViewChecker;

class MedicalService
{
    use ViewChecker;

    /**
     * @var medicalInterface
     */
    private $medicalInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\MedicalInterface $medicalInterface
     */
    public function __construct(Models\MedicalInterface $medicalInterface)
    {
        $this->medicalInterface = $medicalInterface;
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        $this->medicalInterface->create($request);

        return toastr()->success('Catatan kesehatan berhasil dibuat', 'Medical');
    }

    /**
     * Show function.
     * 
     * @param $path
     */
    public function show($path)
    {
        if ($this->checkView($path)) {
            return [
                'ages' => config('enum.medical.age'),
                'statuses' => config('enum.medical.status')
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
                'medical' => $this->medicalInterface->findById($id),
                'ages' => config('enum.medical.age'),
                'statuses' => config('enum.medical.status')
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
        $this->medicalInterface->update($id, $request);

        return toastr()->success('Catatan kesehatan berhasil di ubah', 'Medical');
    }

    /**
     * Destroy function.
     * 
     * @param $id
     */
    public function destroy($id)
    {
        $this->medicalInterface->deleteById($id);

        return toastr()->success('Catatan kesehatan berhasil di hapus', 'Medical');
    }
}