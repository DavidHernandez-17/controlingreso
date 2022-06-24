<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'David Hernandez',
                'email' => 'analistasoporte@albertoalvarez.com',
                'password' => bcrypt('ControlIngreso*')
            ],
            [
                'name' => 'Yonairo Argumedo',
                'email' => 'analistainfraestructura@albertoalvarez.com',
                'password' => bcrypt('Control*')
                
            ]
        ];


        foreach ($users as $user) 
        {
            DB::table('users')->insert($user);
        }
        
    }
}
