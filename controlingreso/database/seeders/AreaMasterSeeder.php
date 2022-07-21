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
            ['area' => 'Arrendamientos'],
            ['area' => 'Avaluos'],
            ['area' => 'Bodegas'],
            ['area' => 'Cartera'],
            ['area' => 'Casa ventas'],
            ['area' => 'Comercial'],
            ['area' => 'Contabilidad'],
            ['area' => 'Desocupaciones'],
            ['area' => 'Dirección administrativa'],
            ['area' => 'Facturación'],
            ['area' => 'Formación y desarrollo'],
            ['area' => 'Gerencia arrendamientos'],
            ['area' => 'Gerencia ejecutiva'],
            ['area' => 'Gerencia general'],
            ['area' => 'Gestión contratos'],
            ['area' => 'Gestión I+D+I'],
            ['area' => 'Gestión de Admon'],
            ['area' => 'Gestión de procesos'],
            ['area' => 'Gestión documental'],
            ['area' => 'Gestión humana'],
            ['area' => 'Gestión jurídica'],
            ['area' => 'Gestión TIC'],
            ['area' => 'Giros'],
            ['area' => 'Innovatech'],
            ['area' => 'Mantenimiento'],
            ['area' => 'Mercadeo'],
            ['area' => 'Novedades'],
            ['area' => 'Operaciones'],
            ['area' => 'Oriente'],
            ['area' => 'Portales y reubicaciones'],
            ['area' => 'Procesos e innovación'],
            ['area' => 'Proyectos especiales'],
            ['area' => 'Proyectos tradicionales'],
            ['area' => 'Servicio al cliente'],
            ['area' => 'Servicios generales'],
            ['area' => 'Servicios públicos'],
            ['area' => 'Socya operación'],
            ['area' => 'Tesorería'],
            ['area' => 'Ventas'],
        ];


        foreach ($areas as $area) {
            AreaMaster::create($area);
        }
        
    }
}
