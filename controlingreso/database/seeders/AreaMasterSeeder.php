<?php

namespace Database\Seeders;

use App\Models\AreaMaster;
use Illuminate\Database\Seeder;

class AreaMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ['area' => 'Gestión TIC'],
            ['area' => 'Procesos e innovación'],
            ['area' => 'I+D+I'],
            ['area' => 'Contratos'],
            ['area' => 'Contabilidad']
        ];


        foreach ($areas as $area) {
            $MDMCreated = AreaMaster::create($area);
        }
        
    }
}
