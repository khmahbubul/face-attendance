<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'super-admin@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '+8801921456789',
            'address' => 'Dhaka, Bangladesh',
            'status' => TRUE
        ]);
        $role = Role::where('name', 'Super Admin')->first();
        $user->assignRole([$role->id]);

        $user = User::create([
            'company_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '+8801921880159',
            'address' => 'Dhaka, Bangladesh',
            'status' => TRUE
        ]);
        $role = Role::where('name', 'Admin')->first();
        $user->assignRole([$role->id]);
    }
}
