<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\WorkerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Expense;
use App\Models\PaymentDetails;
use Carbon\Carbon;

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
    // dd(Expense::find(2)->date);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');


Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}/delete', [CategoryController::class, 'delete'])->name('categories.delete');


Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('/departments/{department}/update', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('/departments/{department}/delete', [DepartmentController::class, 'delete'])->name('departments.delete');

Route::get('/workers/create', [WorkerController::class, 'create'])->name('workers.create');
Route::post('/workers', [WorkerController::class, 'store'])->name('workers.store');
Route::get('/workers', [WorkerController::class, 'index'])->name('workers.index');
Route::get('/workers/{worker}/edit', [WorkerController::class, 'edit'])->name('workers.edit');
Route::put('/workers/{worker}/update', [WorkerController::class, 'update'])->name('workers.update');
Route::delete('/workers/{worker}/delete', [WorkerController::class, 'delete'])->name('workers.delete');

Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}/update', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}/delete', [CustomerController::class, 'delete'])->name('customers.delete');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}/delete', [ProductController::class, 'delete'])->name('products.delete');


Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('/invoices', [InvoiceController::class,'store'])->name('invoices.store');
Route::get('/invoices', [InvoiceController::class,'index'])->name('invoices.index');




Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users', [CustomerController::class, 'index'])->name('users.index');
Route::get('/users/{customer}/edit', [CustomerController::class, 'edit'])->name('users.edit');
Route::put('/users/{customer}/update', [CustomerController::class, 'update'])->name('users.update');
Route::delete('/users/{customer}/delete', [CustomerController::class, 'delete'])->name('customers.delete');




Route::get('/workers/all', [WorkerController::class, 'getAllWorkers'])->name('workers.getAllWorkers');


Route::get('/test-q', function () {
    $startDate = Carbon::today();
    $endDate = Carbon::today()->addDays(7);
    $bb = PaymentDetails::whereBetween('payment_received_date', [$startDate,$endDate])->orderBy('payment_received_date', 'asc')->get();

    dd($bb);
});
