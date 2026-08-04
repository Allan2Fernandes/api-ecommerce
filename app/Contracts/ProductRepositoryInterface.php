<?php

namespace App\Contracts;

use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface {
    public function GetProducts(): Collection;

    public function GetProduct(string $productId): Product;
}