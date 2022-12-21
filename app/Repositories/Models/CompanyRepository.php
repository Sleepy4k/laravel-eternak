<?php

namespace App\Repositories\Models;

use App\Models\Company;
use App\Traits\UploadFile;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\CompanyInterface;

class CompanyRepository extends EloquentRepository implements CompanyInterface
{
    use UploadFile;
    
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base respository constructor
     * 
     * @param Model $model
     */
    public function __construct(Company $model)
    {
        $this->model = $model;
    }
    
    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return Model
     */
    public function update(int $modelId, array $payload): bool
    {
        if (array_key_exists('logo', $payload)) {
            $payload["logo"] = $this->updateSingleFile('image', $payload["logo"], array_key_exists('old_logo', $payload) ? $payload['old_logo'] : '');
        }

        return $this->findById($modelId)->update($payload);
    }
}