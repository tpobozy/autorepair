<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

class ClientRepository extends AbstractRepository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Entities\Client';
    }

    
}