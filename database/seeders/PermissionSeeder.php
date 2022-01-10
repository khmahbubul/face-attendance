<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'company-read'
        ]);
        Permission::create([
            'name' => 'company-create'
        ]);
        Permission::create([
            'name' => 'company-update'
        ]);
        Permission::create([
            'name' => 'company-delete'
        ]);

        Permission::create([
            'name' => 'user-read'
        ]);
        Permission::create([
            'name' => 'user-create'
        ]);
        Permission::create([
            'name' => 'user-update'
        ]);
        Permission::create([
            'name' => 'user-delete'
        ]);

        Permission::create([
            'name' => 'monitor-read'
        ]);

        Permission::create([
            'name' => 'department-read'
        ]);
        Permission::create([
            'name' => 'department-create'
        ]);
        Permission::create([
            'name' => 'department-update'
        ]);
        Permission::create([
            'name' => 'department-delete'
        ]);

        Permission::create([
            'name' => 'designation-read'
        ]);
        Permission::create([
            'name' => 'designation-create'
        ]);
        Permission::create([
            'name' => 'designation-update'
        ]);
        Permission::create([
            'name' => 'designation-delete'
        ]);

        Permission::create([
            'name' => 'leave-read'
        ]);
        Permission::create([
            'name' => 'leave-create'
        ]);
        Permission::create([
            'name' => 'leave-update'
        ]);
        Permission::create([
            'name' => 'leave-delete'
        ]);
    }
}
