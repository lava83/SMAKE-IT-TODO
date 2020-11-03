<?php

namespace App\Repositories\Eloquent;


use App\Repositories\Interfaces\IEloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Base
 * @package App\Repositories\Eloquent
 */
class Base implements IEloquent
{

    /**
     * @var Model
     */
    protected $model;

    /**
     * @inheritdoc
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritdoc
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @inheritdoc
     */
    public function update(array $data, $id): Model
    {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }

    /**
     * @inheritdoc
     */
    public function delete($id): Model
    {
        $model = $this->find($id);
        $model->delete();
        return $model;
    }

    /**
     * @inheritdoc
     */
    public function find($id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @inheritdoc
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
