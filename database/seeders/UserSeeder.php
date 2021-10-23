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
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '+8801921456789',
            'address' => 'Dhaka, Bangladesh',
            'status' => TRUE
        ]);
        $role = Role::where('name', 'Super Admin')->first();
        $user->assignRole([$role->id]);
    }
}
