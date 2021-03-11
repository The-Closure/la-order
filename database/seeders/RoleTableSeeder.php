<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name'         => 'admin'
        ]);

        $onwerRole = Role::create([
            'name'         => 'onwer'
        ]);

        $deliveryRole = Role::create([
            'name'         => 'delivery'
        ]);

        $customerRole = Role::create([
            'name'         => 'customer'
        ]);
    }
}
