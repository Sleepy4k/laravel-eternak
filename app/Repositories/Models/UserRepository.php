<?php

namespace App\Repositories\Models;

use App\Models\User;
use App\Traits\UploadFile;
use App\Contracts\Models\UserInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository implements UserInterface
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
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);

        if (array_key_exists('role', $payload)) {
            $model->assignRole($payload['role']);
        } else {
            $model->assignRole('owner');
        }

        return $model->fresh();
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
            unset($payload['old_logo']);
        }
        
        $model = $this->findById($modelId);

        if (array_key_exists('role', $payload)) {
            $model->syncRoles($payload['role']);
        }

        return $model->update($payload);
    }
    
    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function deleteById(int $modelId): bool
    {
        $model = $this->findById($modelId);

        return $model->delete();
    }
}