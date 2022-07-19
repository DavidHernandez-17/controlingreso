<?php

namespace Database\Seeders;

use App\Models\AreaMaster;
use App\Models\SiteMaster;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserTableSeeder::class,
            AreaMasterSeeder::class,
            SiteMasterSeeder::class
        ]);
    }
}
