<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        Restaurant::factory(10)->create();
        Meal::factory(50)->create();
    }
}
