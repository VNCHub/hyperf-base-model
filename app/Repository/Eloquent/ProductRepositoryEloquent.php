<?php

namespace App\Repository\Eloquent;
use App\Model\Product;
use App\Repository\ProductRepositoryInterface;

class ProductRepositoryEloquent extends AbstractEloquentRepository implements ProductRepositoryInterface
{
    public function __construct()
    {
        $this->model = new Product();
    }
}
