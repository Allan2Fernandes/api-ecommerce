<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\WishListItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<WishListItem>
 */
class WishListItemFactory extends Factory
{
   protected $model = WishListItem::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
            'product_id' => Product::factory(),
            'wishlist_id' => Wishlist::factory()
        ];
    }
}
