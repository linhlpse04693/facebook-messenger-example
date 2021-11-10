<?php

namespace App\Services;

interface ServiceInterface
{
    public function all();
    public function get($id): array;
    public function store($data);
    public function show($id);
    public function update($id, $data);
    public function destroy($ids);
    public function paginate($perPage);
}
