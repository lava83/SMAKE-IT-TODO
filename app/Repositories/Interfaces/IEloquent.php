<?php
namespace App\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IEloquent
{

    /**
     * To create model
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;


    /**
     *
     * to update model
     *
     * @param array $data
     * @param $id
     * @return Model
     */
    public function update(array $data, $id): Model;


    /**
     *
     * to delete model
     *
     * @param $id
     * @return Model
     */
    public function delete($id): Model;

    /**
     *
     * to find model
     *
     * @param $id
     * @return Model
     */
    public function find($id): Model;

    /**
     * all todos
     * @return Collection
     */
    public function all(): Collection;
}
