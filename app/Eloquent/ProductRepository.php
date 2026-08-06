<?php

namespace App\Eloquent;
use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface {
    public function GetProducts(int $limit): Collection {
        return Product::query()
        ->select(['id', 'name', 'category_id', 'description'])
        ->with(['category:id,name,parent_id', 'images:id,url,imageable_id'])
        ->get()
        ->groupBy('category_id')
        ->flatMap(fn ($products) => $products->take($limit))
        ->values();
    }

    public function GetProduct(string $productid): Product
    {
        return Product::with(['category.parent_nested', 'images:id,url,imageable_id'])->findOrFail($productid);
    }
}

