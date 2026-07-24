<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Log;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tree = [
            'Electronics' => [
                'Laptops' => ['Gaming Laptops', 'Ultrabooks', 'Chromebooks'],
                'Phones' => ['Smartphones', 'Feature Phones'],
                'Audio' => ['Headphones', 'Speakers', 'Earbuds'],
            ],
            'Clothing' => [
                "Men's" => ['Shirts', 'Trousers', 'Outerwear'],
                "Women's" => ['Dresses', 'Tops', 'Outerwear'],
                'Kids' => ['Boys', 'Girls'],
            ],
            'Home & Garden' => [
                'Furniture' => ['Sofas', 'Tables', 'Chairs'],
                'Kitchen' => ['Cookware', 'Appliances'],
            ],
        ];

        foreach ($tree as $rootName => $midCategories) {
            $root = Category::factory()->create(['name' => $rootName]);

            // Attach a handful of products directly to the root category too
            Product::factory()
                ->count(5)
                ->forCategory($root)
                ->create();

            foreach ($midCategories as $midName => $leafCategories) {
                $mid = Category::factory()->childOf($root)->create(['name' => $midName]);

                // Products attached at the mid tier
                Product::factory()
                    ->count(10)
                    ->forCategory($mid)
                    ->create();

                foreach ($leafCategories as $leafName) {
                    $leaf = Category::factory()->childOf($mid)->create(['name' => $leafName]);

                    // Products attached at the leaf tier
                    Product::factory()
                        ->count(15)
                        ->forCategory($leaf)
                        ->create();
                }
            }
        }
    }
}