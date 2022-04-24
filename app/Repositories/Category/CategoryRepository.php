<?php

namespace App\Repositories\Category;

use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll()
    {
        return Category::all();
    }

    public function getCategory($category)
    {
        return $category;
    }

    public function create($data)
    {
        return Category::create($data);
    }

    public function update($category, $data)
    {
        $category->update($data);
        return $category;
    }

    public function delete($category)
    {
        return  $category->delete();
    }
}
