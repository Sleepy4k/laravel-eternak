<?php

namespace App\Repositories\Models;

use App\Models\MedicalRecord;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\MedicalInterface;

class MedicalRepository extends EloquentRepository implements MedicalInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base respository constructor
     * 
     * @param Model $model
     */
    public function __construct(MedicalRecord $model)
    {
        $this->model = $model;
    }
}