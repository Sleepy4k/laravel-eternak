<?php

namespace App\Services\Api\Main;

use App\Contracts\Models;
use App\Traits\ApiRespons;
use App\Http\Resources\Main\MedicalResource;

class MedicalService
{
    use ApiRespons;

    /**
     * @var farmInterface
     */
    private $farmInterface;

    /**
     * @var medicalInterface
     */
    private $medicalInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\FarmInterface $farmInterface
     * @param App\Contracts\Models\MedicalInterface $medicalInterface
     */
    public function __construct(Models\FarmInterface $farmInterface, Models\MedicalInterface $medicalInterface)
    {
        $this->farmInterface = $farmInterface;
        $this->medicalInterface = $medicalInterface;
    }

    /**
     * Index function.
     * 
     * @param $id
     */
    public function index($id)
    {
        try {
            $user = auth('api')->user()->company;
            $medical_record = $this->medicalInterface->all(['*'], [], [['livestock_id', $id], ['company', $user]]);

            if (count($medical_record) == 0) {
                try {
                    $livestock = $this->farmInterface->all(['*'], [], [['register_number', $id], ['company', $user]]);
                    
                    if (count($livestock) == 1) {
                        $medical_record = 'Belum ada catatan yang tersedia';
                    } else {
                        $medical_record = 'Ternak tidak terdaftarkan';
                    }
                    
                    return $this->createResponse(200, 'Data berhasil diterima',
                        [
                            'data' => $medical_record
                        ],
                        [
                            route('api.kesehatan', $id)
                        ]
                    );
                } catch (\Throwable $th) {
                    return $this->createResponse(500, 'Server Error',
                        [
                            'error' => $th->getMessage()
                        ],
                        [
                            route('api.kesehatan', $id)
                        ]

                    );
                }
            }
            
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => MedicalResource::collection($medical_record)
                ],
                [
                    route('api.kesehatan', $id)
                ]
            );
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('api.kesehatan', $id)
                ]
            );
        }
    }
}