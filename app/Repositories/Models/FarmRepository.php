<?php

namespace App\Repositories\Models;

use App\Models\FarmData;
use App\Contracts\Models\FarmInterface;
use App\Repositories\EloquentRepository;

class FarmRepository extends EloquentRepository implements FarmInterface
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
    public function __construct(FarmData $model)
    {
        $this->model = $model;
    }
}