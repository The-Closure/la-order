<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Restaurant;
<<<<<<< HEAD
use App\Models\OrderItem;
=======
use App\Models\Address;
use App\Models\Area;
>>>>>>> 568abd31af7efa78ed5e9558ca22acb0460d87e2
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
<<<<<<< HEAD
        OrderItem::factory(50)->create();
=======
        Address::factory(30)->create();
        Area::factory(25)->create();
        Order::factory(25)->create();
>>>>>>> 568abd31af7efa78ed5e9558ca22acb0460d87e2
    }
}
