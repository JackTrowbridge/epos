<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Provider\en_US\Restaurant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Adding a custom Faker provider for Restaurant
        $this->faker->addProvider(new Restaurant($this->faker));

        return [
            'name' => $this->faker->foodName(),
            'description' => $this->faker->text(200),
            'price' => $this->faker->randomFloat(2, 0, 1000),  // Price between $0.00 and $1000.00
            'image' => $this->faker->imageUrl(640, 480, 'food'),  // Assuming a food-related image
            'stock' => $this->faker->numberBetween(0, 100),  // Stock between 0 and 100 units
        ];
    }

    /**
     * Configure the factory with an after creating callback to attach categories.
     */
    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            // Attach a random set of categories to the new product
            $categories = Category::inRandomOrder()->take(rand(1, 3))->get();
            $product->categories()->attach($categories);
        });
    }
}
