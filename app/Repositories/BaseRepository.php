<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function __call($name, $args)
    {
        return $this->model->{$name}(...$args);
    }

    public function getById(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function destroy($id)
    {
        $model = $this->getById($id);
        $model->delete();
    }

    public function update(int $id, array $data){
        $model = $this->getById($id);
        $model->update($data);
        return $model;
    }

    public function exists(int $id): bool
    {
        return !!$this->getById($id);
    }

}
