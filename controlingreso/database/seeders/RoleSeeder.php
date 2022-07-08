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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);

        Permission::create(['name' => 'admin.menu'])->syncRoles([$role1]);

        //Permisos para empleados
        Permission::create(['name' => 'employees.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'employees.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'employees.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'employees.delete'])->syncRoles([$role1]);
        Permission::create(['name' => 'employees.import'])->syncRoles([$role1, $role2]);

        //Permisos para el registro
        Permission::create(['name' => 'register.index'])->syncRoles([$role1]);

        //Permisos para reportes
        Permission::create(['name' => 'reports.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'reports.export'])->syncRoles([$role1, $role2]);

        //Permisos para usuarios
        Permission::create(['name' => 'user.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.delete'])->syncRoles([$role1]);

    }
}
