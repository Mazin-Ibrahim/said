<?php

namespace App\Providers;

use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Interfaces\Customer\CustomerRepositoryInterface;
use App\Interfaces\Department\DepartmentRepositoryInterface;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Interfaces\Worker\WorkerRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Department\DepartmentRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Worker\WorkerRepository;
use App\Repositories\Customer\CustomerRepository;
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
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
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
