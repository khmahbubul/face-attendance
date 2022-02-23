<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Super Admin'
        ]);
        $permissions = Permission::select('id')->get()->pluck('id');
        $role->syncPermissions($permissions);

        $role = Role::create([
            'name' => 'Admin'
        ]);
        $permissions = Permission::select('id')->where('name', 'not like', 'company-%')->get()->pluck('id');
        $role->syncPermissions($permissions);

        $userRole = Role::create([
            'name' => 'User'
        ]);
        $leavePermissions = Permission::select('id')->where('name', 'leave-read')->orWhere('name', 'leave-create')->get()->pluck('id');
        $userRole->syncPermissions($leavePermissions);

        $role = Role::create([
            'name' => 'Monitor'
        ]);
        $permissions = Permission::select('id')->where('name', 'monitor-read')->get()->pluck('id');
        $role->syncPermissions($permissions);
    }
}
