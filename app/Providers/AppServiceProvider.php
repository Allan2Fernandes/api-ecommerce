<?php

namespace App\Providers;

use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Contracts\WishlistRepositoryInterface;
use App\Eloquent\CategoryRepository;
use App\Eloquent\ProductRepository;
use App\Eloquent\WishlistRepository;
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
                $this->app->bind(WishlistRepositoryInterface::class, concrete: WishlistRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
