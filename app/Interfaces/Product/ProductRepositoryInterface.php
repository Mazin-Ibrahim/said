<?php

namespace App\Interfaces\Product;

interface ProductRepositoryInterface
{
    public function getAll();
    public function getProduct($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
