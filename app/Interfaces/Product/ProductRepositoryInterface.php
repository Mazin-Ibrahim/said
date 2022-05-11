<?php

namespace App\Interfaces\Product;

interface ProductRepositoryInterface
{
    public function getAll($request);
    public function getProduct($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
