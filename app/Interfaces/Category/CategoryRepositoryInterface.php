<?php

namespace App\Interfaces\Category;

interface CategoryRepositoryInterface
{
    public function getAll();
    public function getCategory($category);
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function delete($category);
}
