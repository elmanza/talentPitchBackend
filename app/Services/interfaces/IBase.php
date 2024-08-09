<?php

namespace App\Services\interfaces;

interface IBase
{
    public function all($columns = array('*'));
    public function paginate($perPage = 15, $columns = array('*'));
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id, $userId = null);
    public function find($id, $columns = array('*'));
    public function findBy($attribute, $value, $columns = array('*'));
    public function updateOrCreate(array $localizers, array $data);
}
