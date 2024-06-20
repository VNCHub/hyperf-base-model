<?php

namespace App\Repository\Eloquent;

use Hyperf\Database\Model\Builder;
use Hyperf\Database\Model\Collection;
use Hyperf\Database\Model\Model as DBModel;
use Hyperf\DbConnection\Model\Model;

class AbstractEloquentRepository
{
    protected Model $model;

    public function save(object $entity): bool
    {
        $model = new $this->model((array)$entity);
        return $model->save();
    }

    public function create(array $attributes = []): Builder|DBModel
    {
        return $this->model::query()->create($attributes);
    }

    public function all(): Collection
    {
        return $this->model::all();
    }

    public function find(int $id): ?Model
    {
        return $this->model::find($id);
    }

    public function delete(int $id): int
    {
        return $this->model::query()->where('id', $id)->delete();
    }

    public function update(int $id, array $attributes = []): Builder|DBModel
    {
        $data = $this->model::query()->where('id', $id)->firstOrFail();
        $data->update($attributes);

        return $data;
    }
}
