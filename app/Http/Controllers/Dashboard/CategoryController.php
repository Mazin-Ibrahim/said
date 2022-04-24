<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\storeRequest;
use App\Http\Requests\Api\Category\updateRequest;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryInterface;
    public function __construct(CategoryRepositoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function index()
    {
        $categories = $this->categoryInterface->getAll();
        return inertia('Dashboard/Category/index',[
            'categories' => $categories
        ]);
    }
   
    public function create()
    {
        return inertia()->render('Dashboard/Category/create');
    }

    public function store(storeRequest $request)
    {
        
        $this->categoryInterface->create($request->only(['name']));
        
        return redirect()->route('categories.index')->with('success','Category created successfully');
       
    }
    public function edit(Category $category)
    {
        return inertia()->render('Dashboard/Category/edit',[
            'category' => $category
        ]);
    }
    public function update(Category $category, updateRequest $request)
    {
        $this->categoryInterface->update($category,$request->only(['name']));
        return redirect()->route('categories.index');
    }
    public function delete(Category $category)
    {
        $this->categoryInterface->delete($category);
        return redirect()->route('categories.index');
    }
 
}
