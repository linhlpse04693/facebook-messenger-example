<?php

namespace App\Services;

/**
 *
 */
abstract class AbstractService implements ServiceInterface
{
    protected $model;

    public function all()
    {
        return $this->model->all();
    }

    public function get($id): array
    {
        $model = $this->model->find($id);

        return empty($model) ? [] : $model;
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($id, $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy($ids)
    {
        $this->model->destroy($ids);
    }

    public function paginate($perPage)
    {
        return $this->model->paginate($perPage);
    }
}
