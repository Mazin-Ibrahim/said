<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DepartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');


Route::get('/categories/create',[CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories',[CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories',[CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}/edit',[CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}/update',[CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}/delete',[CategoryController::class, 'delete'])->name('categories.delete');


Route::get('/departments/create',[DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments',[DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments',[DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/{department}/edit',[DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('/departments/{department}/update',[DepartmentController::class, 'update'])->name('departments.update');
Route::delete('/departments/{department}/delete',[DepartmentController::class, 'delete'])->name('departments.delete');