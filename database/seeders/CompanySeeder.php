<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'cpsd',
            'token' => bcrypt(time()),
            'face_api_secret' => bcrypt(time())
        ]);
    }
}
