<?php

namespace App\Eloquent;

use App\Contracts\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function GetCategories(): Collection {
        return Category::query()->get();
    }
}
