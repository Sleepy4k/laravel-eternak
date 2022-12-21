<?php

namespace App\Services\Api\Main;

use App\Contracts\Models;
use App\Traits\ApiRespons;
use App\Traits\RandomNumber;
use App\Http\Resources\Main\FarmResource;

class FarmDataService
{
    use RandomNumber, ApiRespons;

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
     */
    public function index()
    {
        try {
            $farm_data = $this->farmInterface->all(['*'], [], [['company', auth('api')->user()->company]]);

            if (count($farm_data) > 0) {
                return $this->createResponse(200, 'Data berhasil diterima',
                    [
                        'data' => FarmResource::collection($farm_data)
                    ],
                    [
                        route('livestock.index')
                    ]
                );
            } else {
                return $this->createResponse(200, 'Data berhasil diterima',
                    [
                        'data' => 'Tidak ada data yang tersedia'
                    ],
                    [
                        route('livestock.index')
                    ]
                );
            }
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('livestock.index')
                ]
            );
        }
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        try {
            $this->farmInterface->create($request);

            return $this->createResponse(201, 'Data berhasil dibuat', [],
                    [
                        route('livestock.index')
                    ]
                );
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('livestock.index')
                ]
            );
        }
    }
}