<?php

namespace Database\Seeders;

use App\Models\SiteMaster;
use Illuminate\Database\Seeder;

class SiteMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sites = [
            ['site' => 'Centro'],
            ['site' => 'Laureles'],
            ['site' => 'Poblado'],
            ['site' => 'Envigado'],
            ['site' => 'Sabaneta'],
            ['site' => 'La venta']
        ];

        foreach( $sites as $site) {
            SiteMaster::create($site);
        }
    }
}
