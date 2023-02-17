<?php

use App\Http\Controllers\Api\Auth\authController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContractorController;
use App\Http\Controllers\Api\ContractorExpenseController;
use App\Http\Controllers\Api\CreditorController;
use App\Http\Controllers\Api\CreditorDetailsController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DailyReportController;
use App\Http\Controllers\Api\DebtController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\DeportationController;
use App\Http\Controllers\Api\DollarController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\ExpenseReportController;
use App\Http\Controllers\Api\IncomeController;
use App\Http\Controllers\Api\IncomeReportController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\InvoiceMaintenanceController;
use App\Http\Controllers\Api\InvoicePaymentController;
use App\Http\Controllers\Api\InvoiceReportController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\LocationExpenseController;
use App\Http\Controllers\Api\MaintenanceController;
use App\Http\Controllers\Api\MarketingClientController;
use App\Http\Controllers\Api\PaymentReportController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductReportController;
use App\Http\Controllers\Api\SalaryController;
use App\Http\Controllers\Api\SellingMethodController;
use App\Http\Controllers\Api\SeparateLocationController;
use App\Http\Controllers\Api\UserController;
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

    Route::post('/workers/{worker}/debts', [DebtController::class, 'store']);
    Route::get('/workers/{worker}/debts', [DebtController::class, 'getWorkesDebts']);

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
    Route::get('/products/report/danger-zone', [ProductReportController::class, 'getProductsInDangerZone']);

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
    Route::put('/maintenances/{maintenance}/updateMaintenanceVisit', [MaintenanceController::class, 'updateMaintenanceVisit']);
    Route::put('/maintenances/{maintenance}/updateMaintenancePayment', [MaintenanceController::class, 'updateMaintenancePayment']);

    Route::get('/invoices', [InvoiceController::class, 'index']);
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'getInvoice']);
    Route::post('/invoices', [InvoiceController::class, 'store']);
    Route::put('/invoices/{invoice}', [InvoiceController::class, 'update']);
    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'delete']);


    Route::post('/invoices/report/byDay', [InvoiceReportController::class, 'getInvoicesByDay']);
    Route::post('/invoices/report/getSalesByPeriodDate', [InvoiceReportController::class, 'getSalesByPeriodDate']);
    Route::post('/invoices/report/getSalesBySpecificCustomer', [InvoiceReportController::class, 'getSalesBySpecificCustomer']);
    Route::post('/invoices/report/getProductSalesByPeroidDate', [InvoiceReportController::class, 'getProductSalesByPeroidDate']);


    Route::get('/invoices/report/getTotalSalesOnMonth', [InvoiceReportController::class, 'getTotalSalesOnMonth']);

    Route::post('/invoices/maintenance', [InvoiceMaintenanceController::class, 'createInvoiceMaintenance']);

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


    Route::post('/locations', [LocationController::class, 'store']);
    Route::put('/locations/{location}', [LocationController::class, 'updateLocation']);
    Route::delete('/locations/{location}', [LocationController::class, 'delete']);
    
    Route::get('/locations', [LocationController::class, 'index']);
    Route::get('/locations/{location}', [LocationController::class, 'show']);
    Route::get('/locations/{location}/paymentDetails', [LocationController::class, 'getLocationPaymentDetails']);
    Route::post('/locations/{location}/collectionLocationPayment', [LocationController::class, 'collectionLocationPayment']);
    Route::put('/locations/{location}/updateProducts', [LocationController::class, 'updateProductsStatusBelongToLocation']);
    Route::post('/locations/{location}/deleteProductsFromLocation', [LocationController::class, 'deleteProductsFromLocation']);
    Route::post('/locations/{location}/updateProductsFromLoaction', [LocationController::class, 'updateProductsFromLoaction']);


    Route::get('/deportations', [DeportationController::class, 'index']);
    Route::post('/deportations', [DeportationController::class, 'store']);
    Route::put('/deportations/{deportation}', [DeportationController::class, 'update']);
    Route::delete('/deportations/{deportation}', [DeportationController::class, 'update']);


    Route::post('/creditors', [CreditorController::class, 'store']);
    Route::get('/creditors', [CreditorController::class, 'index']);
    Route::get('/creditors/{creditor}', [CreditorController::class, 'show']);
    Route::put('/creditors/{creditor}', [CreditorController::class, 'update']);
    Route::delete('/creditors/{creditor}', [CreditorController::class, 'delete']);

    Route::post('/creditors/{creditor}/creditorPayment', [CreditorDetailsController::class, 'creditorPayment']);


    Route::post('contractors', [ContractorController::class, 'store']);
    Route::get('contractors', [ContractorController::class, 'index']);
    Route::get('contractors/{contractor}', [ContractorController::class, 'show']);
    Route::put('contractors/{contractor}', [ContractorController::class, 'update']);
    Route::delete('contractors/{contractor}', [ContractorController::class, 'delete']);

    Route::post('contractors/{contractor}/expense', [ContractorExpenseController::class, 'createExpense']);

    Route::post('/salaries', [SalaryController::class, 'store']);
    Route::get('/salaries', [SalaryController::class, 'index']);
    Route::get('/salaries/{salary}', [SalaryController::class, 'show']);
    Route::put('/salaries/{salary}', [SalaryController::class, 'update']);
    Route::delete('/salaries/{salary}', [SalaryController::class, 'delete']);
    Route::get('/salaries/worker/{worker}', [SalaryController::class, 'getWorkerSalaries']);

    Route::post('sellingMethods', [SellingMethodController::class, 'store']);
    Route::get('sellingMethods', [SellingMethodController::class, 'index']);
    Route::get('sellingMethods/{sellingMethod}', [SellingMethodController::class, 'show']);
    Route::put('sellingMethods/{sellingMethod}', [SellingMethodController::class, 'update']);
    Route::delete('sellingMethods/{sellingMethod}', [SellingMethodController::class, 'delete']);


    Route::post('/marketingClients', [MarketingClientController::class, 'store']);
    Route::post('/createMarketingClientDetails/{marketingClient}', [MarketingClientController::class, 'createMarketingClientDetails']);
    Route::put('/marketingClients/{marketingClient}', [MarketingClientController::class, 'update']);
    Route::get('/marketingClients/{marketingClient}', [MarketingClientController::class, 'show']);
    Route::get('/marketingClients', [MarketingClientController::class, 'index']);
    Route::delete('/marketingClients/{marketingClient}', [MarketingClientController::class, 'delete']);


    Route::post('/dollar', [DollarController::class, 'store']);
    Route::get('/dollar/{dollar}', [DollarController::class, 'getDollar']);
    Route::put('/dollar/{dollar}', [DollarController::class, 'update']);

    Route::post('/ivoices/{invoice}/payment', [InvoicePaymentController::class, 'store']);



    Route::get('/payments/reports', [PaymentReportController::class, 'getPaymentsReport']);


    Route::post('/separate-location', [SeparateLocationController::class,'store']);
    Route::post('/assing-products-location', [SeparateLocationController::class,'assingProductsToLocation']);


    Route::post('/location/expenses', [LocationExpenseController::class, 'store']);
    Route::put('/location/expenses/{locationExpense}', [LocationExpenseController::class, 'update']);
    Route::get('/location/{location}/expenses', [LocationExpenseController::class, 'getlocationExpenses']);



    Route::post('/users/store', [UserController::class, 'store']);
    Route::get('/users', [UserController::class, 'getAllUsers']);
    Route::put('/users/{user}/update', [UserController::class, 'update']);
});
