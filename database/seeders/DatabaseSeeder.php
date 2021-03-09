<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Address;
use App\Models\Area;
use App\Models\Category;
use App\Models\User;
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
        Category::factory(5)->create();
        Meal::factory(50)->create();
        // OrderItem::factory(50)->create();
        Area::factory(25)->create();
        // Address::factory(30)->create();
        // Order::factory(25)->create();
        $user = User::create([
            'name'  => 'Roduan',
            'email' => 'super@admin.com',
            'phone' => '0946452937',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole('customer');
    }
}
