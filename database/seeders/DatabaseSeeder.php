<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarManufacture;
use App\Models\CarModel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        CarModel::factory(3)->create();
        CarManufacture::factory(100)->create();
        Car::factory(500)->create();
    }
}
