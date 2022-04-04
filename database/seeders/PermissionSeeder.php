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
        Permission::updateOrCreate([
            'name' => 'company-read'
        ]);
        Permission::updateOrCreate([
            'name' => 'company-create'
        ]);
        Permission::updateOrCreate([
            'name' => 'company-update'
        ]);
        Permission::updateOrCreate([
            'name' => 'company-delete'
        ]);

        Permission::updateOrCreate([
            'name' => 'user-read'
        ]);
        Permission::updateOrCreate([
            'name' => 'user-create'
        ]);
        Permission::updateOrCreate([
            'name' => 'user-update'
        ]);
        Permission::updateOrCreate([
            'name' => 'user-delete'
        ]);

        Permission::updateOrCreate([
            'name' => 'monitor-read'
        ]);

        Permission::updateOrCreate([
            'name' => 'department-read'
        ]);
        Permission::updateOrCreate([
            'name' => 'department-create'
        ]);
        Permission::updateOrCreate([
            'name' => 'department-update'
        ]);
        Permission::updateOrCreate([
            'name' => 'department-delete'
        ]);

        Permission::updateOrCreate([
            'name' => 'designation-read'
        ]);
        Permission::updateOrCreate([
            'name' => 'designation-create'
        ]);
        Permission::updateOrCreate([
            'name' => 'designation-update'
        ]);
        Permission::updateOrCreate([
            'name' => 'designation-delete'
        ]);

        Permission::updateOrCreate([
            'name' => 'leave-read'
        ]);
        Permission::updateOrCreate([
            'name' => 'leave-create'
        ]);
        Permission::updateOrCreate([
            'name' => 'leave-update'
        ]);
        Permission::updateOrCreate([
            'name' => 'leave-delete'
        ]);

        Permission::updateOrCreate([
            'name' => 'attendance-report-read'
        ]);
    }
}
