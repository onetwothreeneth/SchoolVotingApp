<?php

namespace App\Repositories;

use App\Contracts\ProductInterface;
use App\Repositories\ResourceRepository;

class ProductRepository extends ResourceRepository implements ProductInterface
{
    protected $model;
    protected $max;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->max = 10;
    }

}