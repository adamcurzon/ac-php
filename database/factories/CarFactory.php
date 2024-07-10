<?php

namespace Database\Factories;

use App\Models\CarManufacture;
use App\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "car_model_id" => CarModel::all()->random()->id,
            "car_manufacture_id" => CarManufacture::all()->random()->id,
            "year" => fake()->numberBetween(1999, 2024)
        ];
    }
}
