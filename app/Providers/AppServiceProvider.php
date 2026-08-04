<?php

namespace App\Providers;

use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Eloquent\CategoryRepository;
use App\Eloquent\ProductRepository;
use Database\Factories\CategoryFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
                $this->app->bind(ProductRepositoryInterface::class, concrete: ProductRepository::class);
                $this->app->bind(CategoryRepositoryInterface::class, concrete: CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
