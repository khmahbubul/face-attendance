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
            'name' => 'ai'
        ]);

        Sync::create([
            'company_id' => 1,
            'name' => 'device'
        ]);
    }
}
