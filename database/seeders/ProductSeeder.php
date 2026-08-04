<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Number of products to create at each depth level.
     * Index 0 = root, 1 = second level, etc.
     */
    private const PRODUCTS_PER_LEVEL = [5, 10, 15, 8];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tree = [
            'Electronics' => [
                'Laptops' => [
                    'Gaming Laptops' => [
                        '15-inch' => [
                            'Alienware Laptops' => [], 
                            'LG Laptops' => [],
                            'Samsung Laptops' => []
                        ],
                        '17-inch' => [],
                    ],
                    'Ultrabooks' => [],
                    'Chromebooks' => [],
                ],
                'Phones' => [
                    'Smartphones' => [
                        'Android' => [],
                        'iOS' => [],
                    ],
                    'Feature Phones' => [],
                ],
                'Audio' => [
                    'Headphones' => [],
                    'Speakers' => [],
                    'Earbuds' => [],
                ],
            ],
            'Clothing' => [
                "Men's" => [
                    'Shirts' => [],
                    'Trousers' => [],
                    'Outerwear' => [],
                ],
                "Women's" => [
                    'Dresses' => [],
                    'Tops' => [],
                    'Outerwear' => [],
                ],
                'Kids' => [
                    'Boys' => [],
                    'Girls' => [],
                ],
            ],
            'Home & Garden' => [
                'Furniture' => [
                    'Sofas' => [],
                    'Tables' => [],
                    'Chairs' => [],
                ],
                'Kitchen' => [
                    'Cookware' => [],
                    'Appliances' => [],
                ],
            ],
        ];

        foreach ($tree as $rootName => $children) {
            $this->seedCategoryTree($rootName, null, $children, 0);
        }
    }

    /**
     * Recursively create a category, attach products to it,
     * and seed its children.
     *
     * @param  string  $name  Name of the category to create
     * @param  Category|null  $parent  Parent category, or null for a root
     * @param  array  $children  Subtree of child categories
     * @param  int  $depth  Current depth, used to vary product count per level
     */
    private function seedCategoryTree(string $name, ?Category $parent, array $children, int $depth): void
    {
        $category = $parent
            ? Category::factory()->childOf($parent)->create(['name' => $name])
            : Category::factory()->create(['name' => $name]);

        Product::factory()
            ->count($this->productCountForDepth($depth))
            ->forCategory($category)
            ->create();

        foreach ($children as $childName => $grandchildren) {
            $this->seedCategoryTree($childName, $category, $grandchildren, $depth + 1);
        }
    }

    /**
     * Get the number of products to seed at a given depth,
     * falling back to the last defined value for deeper levels.
     */
    private function productCountForDepth(int $depth): int
    {
        return self::PRODUCTS_PER_LEVEL[$depth]
            ?? self::PRODUCTS_PER_LEVEL[array_key_last(self::PRODUCTS_PER_LEVEL)];
    }
}