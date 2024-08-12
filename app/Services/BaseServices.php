<?php

namespace App\Services;

use App\Services\interfaces\IBase;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of BaseServices
 *
 * @author AndresManzano
 */
abstract class BaseServices implements IBase
{
    protected $model;

    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * Specify Model class
     *
     * @return mixed
     */
    abstract public function model();

    private function makeModel()
    {
        $this->model = App::make($this->model());

        if (!$this->model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
    }


    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $item = $this->find($id);
        $item->update($data);
        return $item;
    }

    /**
     * @param array $localizers
     * @param array $data
     * @return mixed
     */
    public function updateOrCreate(array $localizers, array $data)
    {
        return $this->model->updateOrCreate($localizers, $data);
    }

    /**
     * @param $id
     * @param $userId
     * @return mixed
     */
    public function delete($id, $userId = null)
    {
        if (!is_null($userId)) {
            $item = $this->model->find($id);
            if ($item->hasAttribute('deleted_by')) {
                $item->deleted_by = $userId;
                $item->save();
            }
        }
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param $userId
     * @return mixed
     */
    public function deleteByColumn(array $where = [])
    {
        try {
            if(!empty($where)){
                $res = $this->model->where($where)->delete();
                return $res;
            }
            return "Error inside function deleteByColumn";
        } catch (\Throwable $th) {
            return "[deleteByColumn]: 500 server error";
        }

    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    /**
     * @param $userId
     * @param array $columns
     * @return mixed
     */
    public function allByUser($userId, $columns = array('*'))
    {
        return $this->model->where('user_id', $userId)->get($columns);
    }

    /**
     * Search for a model with a given parameter(s)
     * @param  array    $where     [the parameter to search (empty to retrieve all)]
     * @param  array    $relations [All posible relations for this model]
     * @param  int|null $paginate  [number of items per page]
     * @return [type]              [Query with specified params]
     */
    public function where(array $where, array $relations = [], int $paginate = NULL)
    {
        $query = $this->model->where($where);

        if ($relations != NULL) {
            $query = $query->with($relations);
        }

        if($paginate != NULL) {
            $query = $query->paginate($paginate);
        } else {
            $query = $query->get();
        }

        return $query;
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }
}
