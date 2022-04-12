<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\storeRequest;
use App\Http\Requests\Api\Category\updateRequest;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepository = $categoryRepositoryInterface;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return response()->json($categories, 200);
    }

    public function getCategory(Category $category)
    {
        return response()->json($category, 200);
    }

    public function store(storeRequest $request)
    {
        $category = $this->categoryRepository->create($request->only('name', 'parent_id'));
        return response()->json($category, 201);
    }

    public function update(updateRequest $request, Category $category)
    {
        $category = $this->categoryRepository->update($category, $request->only('name', 'parent_id'));
        return response()->json($category, 204);
    }

    public function delete(Category $category)
    {
        $this->categoryRepository->delete($category);
        return response()->json(null, 204);
    }
}
