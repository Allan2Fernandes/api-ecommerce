<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function GetCategories(): Collection;
}
