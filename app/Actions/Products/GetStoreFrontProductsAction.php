<?php

namespace App\Actions\Products;

use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class GetStoreFrontProductsAction
{
    use AsAction;

    protected ProductRepositoryInterface $productRepositoryInterface;

    public function __construct(ProductRepositoryInterface $productRepositoryInterface)
    {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }

    public function handle(): Collection
    {
        return $this->productRepositoryInterface->GetProducts()->groupBy('category_id');
    }
}
