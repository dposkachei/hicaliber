<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(100, 1000000),
            'bedrooms' => $this->faker->numberBetween(0, 5),
            'bathrooms' => $this->faker->numberBetween(0, 5),
            'storeys' => $this->faker->numberBetween(0, 5),
            'garages' => $this->faker->numberBetween(0, 5),
            'status' => Listing::STATUS_ACTIVE,
        ];
    }
}
