<?php

namespace App\Eloquent;
use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface {
    public function GetProducts(): Collection {
        return Product::query()
        ->select(['id', 'name', 'category_id', 'description'])
        ->with('category:id,name,parent_id')
        ->get();
    }

    public function GetProduct(string $productid): Product
    {
        return Product::with('category.parent_nested')->findOrFail($productid);
    }
}

