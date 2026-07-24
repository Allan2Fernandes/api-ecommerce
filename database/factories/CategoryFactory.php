<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
            'name' => ucfirst($this->faker->unique()->words(2, true)),
            'parent_id' => null, // root category by default
        ];
    }

    /**
     * Indicate that this category has a specific parent.
     */
    public function childOf(Category $parent): static
    {
        return $this->state(fn (array $attributes) => [
            'parent_id' => $parent->id,
        ]);
    }
}