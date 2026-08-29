<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class EditWishlistData extends Data
{
    public function __construct(
        public string $title,
        public string $user_id
    ) {}

    public static function rules(ValidationContext $context = null): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'user_id' => ['required', 'string', 'uuid'],
        ];
    }
}
