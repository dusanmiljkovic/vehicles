<?php

namespace Database\Factories;

use App\Models\BrandModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BrandModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
