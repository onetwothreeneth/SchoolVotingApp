<?php

namespace App\Repositories;

use App\Contracts\UserInterface;
use App\Repositories\ResourceRepository;

class UserRepository extends ResourceRepository implements UserInterface
{
    protected $model;
    protected $max;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->max = 10;
    }

}