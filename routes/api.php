<?php

use App\Http\Controllers\Api\Auth\authController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DailyReportController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\ExpenseReportController;
use App\Http\Controllers\Api\IncomeController;
use App\Http\Controllers\Api\IncomeReportController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\InvoiceMaintenanceController;
use App\Http\Controllers\Api\InvoiceReportController;
use App\Http\Controllers\Api\MaintenanceController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductReportController;
use App\Http\Controllers\Api\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [authController::class, 'login']);



Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{category}', [CategoryController::class, 'getCategory']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'delete']);
    
    
    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::get('/departments/{department}', [DepartmentController::class, 'getDepartment']);
    Route::post('/departments', [DepartmentController::class, 'store']);
    Route::put('/departments/{department}', [DepartmentController::class, 'update']);
    Route::delete('/departments/{department}', [DepartmentController::class, 'delete']);
    
    Route::get('/workers', [WorkerController::class, 'index']);
    Route::get('/workers/{worker}', [WorkerController::class, 'getWorker']);
    Route::post('/workers', [WorkerController::class, 'store']);
    Route::put('/workers/{worker}', [WorkerController::class, 'update']);
    Route::delete('/workers/{worker}', [WorkerController::class, 'delete']);
    
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{product}', [ProductController::class, 'getProduct']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'delete']);

    Route::post('/products/getProductsPurchaseByDay', [ProductReportController::class, 'getProductsPurchaseByDay']);
    
    Route::get('/products/report/quantity', [ProductReportController::class, 'getProductsQuantity']);
    Route::get('/products/report/profit', [ProductReportController::class, 'getProductsProfit']);
    Route::get('/products/report/count', [ProductReportController::class, 'getProductsCount']);
    Route::post('/products/report/productsCreatedToday', [ProductReportController::class, 'productsCreatedToday']);

    Route::get('/products/report/getStockInformations', [ProductReportController::class, 'getStockInformations']);
    Route::get('/daily/report/getDailyReports', [DailyReportController::class, 'getDailyReports']);

    
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/{customer}', [CustomerController::class, 'getCustomer']);
    Route::post('/customers', [CustomerController::class, 'store']);
    Route::put('/customers/{customer}', [CustomerController::class, 'update']);
    Route::delete('/customers/{customer}', [CustomerController::class, 'delete']);

    Route::get('/maintenances', [MaintenanceController::class, 'index']);
    Route::get('/maintenances/{maintenance}', [MaintenanceController::class, 'getMaintenance']);
    Route::post('/maintenances', [MaintenanceController::class, 'store']);
    Route::put('/maintenances/{maintenance}', [MaintenanceController::class, 'update']);
    Route::delete('/maintenances/{maintenance}', [MaintenanceController::class, 'delete']);

    Route::get('/invoices', [InvoiceController::class, 'index']);
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'getInvoice']);
    Route::post('/invoices', [InvoiceController::class, 'store']);
    Route::put('/invoices/{invoice}', [InvoiceController::class, 'update']);
    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'delete']);


    Route::post('/invoices/report/byDay', [InvoiceReportController::class, 'getInvoicesByDay']);
    Route::post('/invoices/report/getSalesByPeriodDate', [InvoiceReportController::class, 'getSalesByPeriodDate']);
    Route::post('/invoices/report/getSalesBySpecificCustomer', [InvoiceReportController::class, 'getSalesBySpecificCustomer']);
    Route::post('/invoices/report/getProductSalesByPeroidDate', [InvoiceReportController::class, 'getProductSalesByPeroidDate']);
    

    Route::post('/invoices/maintenance',[InvoiceMaintenanceController::class,'createInvoiceMaintenance']);

    Route::get('/incomes', [IncomeController::class, 'index']);
    Route::get('/incomes/{income}', [IncomeController::class, 'getIncome']);
    Route::post('/incomes', [IncomeController::class, 'store']);
    Route::put('/incomes/{income}', [IncomeController::class, 'update']);
    Route::delete('/incomes/{income}', [IncomeController::class, 'delete']);
    Route::post('/incomes/byDay', [IncomeReportController::class, 'getIncomesByDay']);
    Route::post('/incomes/byMonth', [IncomeReportController::class, 'getIncomesByMonth']);
    Route::post('/incomes/byYear', [IncomeReportController::class, 'getIncomesByYear']);
    Route::post('/incomes/byPeriod', [IncomeReportController::class, 'getIncomesByPeriod']);
    
    Route::get('/expenses', [ExpenseController::class, 'index']);
    Route::get('/expenses/{expense}', [ExpenseController::class, 'getExpense']);
    Route::post('/expenses', [ExpenseController::class, 'store']);
    Route::put('/expenses/{expense}', [ExpenseController::class, 'update']);
    Route::delete('/expenses/{expense}', [ExpenseController::class, 'delete']);
    Route::post('/expenses/byDay', [ExpenseReportController::class, 'getExpensesByDay']);
    Route::post('/expenses/byMonth', [ExpenseReportController::class, 'getExpensesByMonth']);
    Route::post('/expenses/byYear', [ExpenseReportController::class, 'getExpensesByYear']);
    Route::post('/expenses/byPeriod', [ExpenseReportController::class, 'getExpensesByPeriod']);
    Route::get('/getLastExpensesReport', [ExpenseReportController::class, 'getLastExpensesReport']);
    
});






