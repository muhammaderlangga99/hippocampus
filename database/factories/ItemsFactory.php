<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence(3);
        $price = $this->faker->numberBetween(1000000, 5000000);
        $discount = $this->faker->numberBetween(10, 50);
        $count_discount = $price * ($discount / 100);
        $after_discount = $price - $count_discount;
        return [
            'name' => $name,
            'categori_id' => fake()->numberBetween(2, 5),
            'slug' => Str::slug($name),
            'link' => fake()->url,
            'description' => fake()->paragraph(2),
            'image' => fake()->imageUrl(640, 480, 'animals', true),
            'price' => $price,
            'discount' => $discount,
            'after_discount' => $after_discount,
        ];
    }
}
