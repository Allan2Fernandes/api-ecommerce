<?php

namespace App\Actions\Categories;

use App\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCategoriesAction
{
    use AsAction;

    protected CategoryRepositoryInterface $categoryRepositoryInterface;

    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }

    public function handle(): Collection
    {
        return $this->categoryRepositoryInterface->GetCategories()->keyBy('id');
    }
}
