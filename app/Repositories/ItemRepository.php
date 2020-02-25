<?php

namespace App\Repositories;

use App\Contracts\ItemInterface;
use App\Repositories\ResourceRepository;

class ItemRepository extends ResourceRepository implements ItemInterface
{
    protected $model;
    protected $max;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->max = 10;
    }

}