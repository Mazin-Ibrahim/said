<?php

namespace App\Providers;

use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Interfaces\Customer\CustomerRepositoryInterface;
use App\Interfaces\Department\DepartmentRepositoryInterface;
use App\Interfaces\Expense\ExpenseReportInterface;
use App\Interfaces\Expense\ExpenseRepositoryInterface;
use App\Interfaces\Income\IncomeRepositoryInterface;
use App\Interfaces\Invoice\InvocieRepositoryInterface;
use App\Interfaces\Maintenance\MaintenanceRepositoryInterface;
use App\Interfaces\Product\ProductReportsInterface;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Interfaces\Worker\WorkerRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Department\DepartmentRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Worker\WorkerRepository;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Expense\ExpenseRepository;
use App\Repositories\Income\IncomeRepository;
use App\Repositories\Invoice\InvoiceRepository;
use App\Repositories\Maintenance\MaintenanceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(WorkerRepositoryInterface::class, WorkerRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductReportsInterface::class, ProductRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
       $this->app->bind(MaintenanceRepositoryInterface::class, MaintenanceRepository::class); 
       $this->app->bind(InvocieRepositoryInterface::class, InvoiceRepository::class);
       $this->app->bind(IncomeRepositoryInterface::class, IncomeRepository::class);
       $this->app->bind(ExpenseRepositoryInterface::class, ExpenseRepository::class);
       $this->app->bind(ExpenseReportInterface::class, ExpenseRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
