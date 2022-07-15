<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'User']);
        $special = Role::create(['name' => 'special']);

        Permission::create(['name' => 'admin.menu'])->syncRoles([$admin]);

        //Permisos para empleados
        Permission::create(['name' => 'employees.index'])->syncRoles([$admin, $user, $special]);
        Permission::create(['name' => 'employees.create'])->syncRoles([$admin, $user, $special]);
        Permission::create(['name' => 'employees.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'employees.delete'])->syncRoles([$admin]);
        Permission::create(['name' => 'employees.import'])->syncRoles([$admin, $user, $special]);
        Permission::create(['name' => 'only.user'])->syncRoles([$user, $special]);

        //Permisos para el registro
        Permission::create(['name' => 'register.index'])->syncRoles([$admin]);

        //Permisos para reportes
        Permission::create(['name' => 'reports.index'])->syncRoles([$admin, $user, $special]);
        Permission::create(['name' => 'reports.indexAll'])->syncRoles([$admin, $special]);
        Permission::create(['name' => 'reports.export'])->syncRoles([$admin, $user, $special]);

        //Permisos para usuarios
        Permission::create(['name' => 'user.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.delete'])->syncRoles([$admin]);

    }
}
