<?php

namespace Database\Seeders;

use App\Models\Sync;
use Illuminate\Database\Seeder;

class SyncSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sync::create([
            'company_id' => 1,
            'name' => 'attendance'
        ]);

        Sync::create([
            'company_id' => 1,
            'name' => 'user',
            'version' => 1
        ]);
    }
}
