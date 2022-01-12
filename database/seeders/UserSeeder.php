<?php

namespace Database\Seeders;

use App\Models\Company;
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
        $token = explode('|', $user->createToken($user->company->name)->plainTextToken)[1];
        $user->company->update(['token' => $token]);

        $role = Role::where('name', 'Admin')->first();
        $user->assignRole([$role->id]);

        $monitor = User::create([
            'company_id' => 1,
            'name' => 'Monitor '.$user->id,
            'email' => 'monitor-'.uniqid().'@email.com',
            'password' => bcrypt('12345678')
        ]);

        $role = Role::where('name', 'Monitor')->first();
        $monitor->assignRole([$role->id]);

        Company::find(1)->update([
            'monitor_id' => $monitor->id,
            'token' => $token
        ]);
    }
}
