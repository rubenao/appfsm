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
        //

        //Agregamos los roles
        $role1=Role::create(['name'=> 'admin']);
        $role2=Role::create(['name'=> 'creador-rutinas']);
        $role3=Role::create(['name'=> 'creador-blog']);
        $role4=Role::create(['name'=> 'creador-recetas']);
        $role5=Role::create(['name'=> 'creador-calendarios']);
        $role6=Role::create(['name'=> 'usuario-fit-registrado']);

        //Agregamos los permisos y le asignamos al rol1 que es de admin
        Permission::create(['name'=> 'administracion.index', 'description' => 'Permite ver el el panel de administracion'])->assignRole($role1);

        Permission::create(['name'=> 'admins.index', 'description' => 'Permite ver el index de admins'])->assignRole($role1);
        Permission::create(['name'=> 'admins.create', 'description' => 'Permite crear rutinas'])->assignRole($role1);
        Permission::create(['name'=> 'admins.edit', 'description' => 'Permite editar rutinas'])->assignRole($role1);

       //Permisos para entrar al panel de usuarios

        Permission::create(['name'=> 'admin.users.index', 'description' => 'Permite ver la lista de usuarios'])->assignRole($role1);
        Permission::create(['name'=> 'admin.users.edit', 'description' => 'Permite editar roles de usuarios'])->assignRole($role1);
        Permission::create(['name'=> 'admin.users.update', 'description' => 'Permite actualizar usuarios'])->assignRole($role1);
        Permission::create(['name'=> 'admin.users.destroy', 'description' => 'Permite eliminar usuarios'])->assignRole($role1);

       //Permisos para entrar al panel de rutinas

        Permission::create(['name'=> 'admin.rutinas.index', 'description' => 'Permite ver lista de rutinas'])->assignRole($role1);
        Permission::create(['name'=> 'admin.rutinas.edit', 'description' => 'permita editar las rutinas'])->assignRole($role1);
        Permission::create(['name'=> 'admin.rutinas.update', 'description' => 'Permite actualizar rutinas'])->assignRole($role1);
        Permission::create(['name'=> 'admin.rutinas.destroy', 'description' => 'Permite eliminar rutinas'])->assignRole($role1);

       //Permisos para panel y creacion de recetas

       //Permisos para el panel y creacion de blog

       //Permisos para el panel y creacion de calendarios


       //Permisos para el panel y creacion de rutas de entrenamiento



       //Permisos para usuario fit-registrado




       //Permisos para usuario-no registrado
       

        //Otorgamos los permisos al rol de admin
        //$role1->givePermissionTo($permission1);
    }
}
