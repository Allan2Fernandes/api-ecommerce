<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class GetStoreFrontData extends Data
{
    public function __construct(
        public int $limit,
    ) {}

    public static function rules(ValidationContext $context = null): array
    {
        return [
            'limit' => ['integer']
        ];
    }
}
