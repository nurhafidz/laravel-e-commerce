<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'harga' => $this->faker->numberBetween($min = 10000, $max = 900000),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'stock' => $this->faker->numberBetween($min = 1, $max = 100),
            'image' => $this->faker->imageUrl($width = 500, $height = 500),
            'status' => 1,
            'store_id' => 1,
            'category_id' => 1,
        ];
    }
}
