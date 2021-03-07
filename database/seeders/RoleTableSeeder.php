<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = \Spatie\Permission\Models\Role::create([
            'name'         => 'admin'
        ]);

        $onwerRole = \Spatie\Permission\Models\Role::create([
            'name'         => 'onwer'
        ]);

        $deliveryRole = \Spatie\Permission\Models\Role::create([
            'name'         => 'delivery'
        ]);

        $customerRole = \Spatie\Permission\Models\Role::create([
            'name'         => 'customer'
        ]);
    }
}
