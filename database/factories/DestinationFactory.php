<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DestinationFactory extends Factory
{
    protected $model = Destination::class;

    public function definition()
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1,9999),
            'excerpt' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(3, true),
            'location' => $this->faker->city(),
            'duration' => $this->faker->randomElement(['1 Hari 1 Malam','2 Hari 1 Malam','3 Hari 2 Malam']),
            'price' => $this->faker->numberBetween(200000,5000000),
            'featured' => $this->faker->boolean(20),
            'is_active' => true,
        ];
    }
}
