<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class GetWishlistsData extends Data
{
    public function __construct(
        //
    ) {}

    public static function rules(ValidationContext $context = null): array
    {
        return [];
    }
}
