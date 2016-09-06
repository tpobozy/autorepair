<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

class OrderRepository extends AbstractRepository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Entities\Order';
    }

    public function findUniqueClientsByName($name, $columns = array('*'))
    {
        return $this->model->where('name', 'LIKE', '%'. $name .'%')->orderBy('id', 'DESC')->groupBy('name')->get($columns);
    }

    public function findUniqueCarsByVIN($name, $columns = array('*'))
    {
        return $this->model->where('vin', 'LIKE', '%'. $name .'%')->orderBy('id', 'DESC')->groupBy('vin')->get($columns);
    }

    
}