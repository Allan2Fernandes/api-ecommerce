<?php

namespace App\Actions;

use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class GetProductAction
{
    use AsAction;

    protected ProductRepositoryInterface $productRepositoryInterface;

    public function __construct(ProductRepositoryInterface $productRepositoryInterface)
    {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }

    public function handle(string $productId): Product
    {
        return $this->productRepositoryInterface->GetProduct($productId);
    }
}
