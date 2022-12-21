<?php

namespace App\Repositories\Models;

use App\Models\Template;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\TemplateInterface;

class TemplateRepository extends EloquentRepository implements TemplateInterface
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
    public function __construct(Template $model)
    {
        $this->model = $model;
    }
}