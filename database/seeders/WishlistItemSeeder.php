<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Database\Factories\WishListItemFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishlistItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wishlistIds = Wishlist::all()->pluck('id');
        $productIds = Product::all()->pluck('id');
        
        $wishlistIds->each(function (string $wishlistId) use ($productIds) {
            $numProducts = min($productIds->count(), rand(1,20));

            $selectedProductIds = $productIds->random($numProducts);

            $selectedProductIds->each(function(string $productId) use ($wishlistId){
                WishlistItem::factory()->create([
                    'wishlist_id' => $wishlistId,
                    'product_id' => $productId
                ]);
            });
        });
    }
}
