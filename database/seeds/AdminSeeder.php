<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Administrador']);
        $role = Role::create(['name' => 'Usuario registrado']);

         Permission::create(['name' => 'ver pelicula']);
         Permission::create(['name' => 'crear pelicula']);
         Permission::create(['name' => 'editar pelicula']);
         Permission::create(['name' => 'alquilar pelicula']);
         Permission::create(['name' => 'comprar pelicula']);
         Permission::create(['name' => 'eliminar pelicula']);
        
         Permission::create(['name' => 'crear usuario']);
         Permission::create(['name' => 'editar usuario']);
         Permission::create(['name' => 'eliminar usuario']);

       $admin = User::create([
        
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'type_user' => true,
        ]);
        $admin->assignRole('Administrador');

        $admin->givePermissionTo('ver pelicula');
        $admin->givePermissionTo('comprar pelicula');
        $admin->givePermissionTo('alquilar pelicula');


        $admin->givePermissionTo('crear pelicula');
        $admin->givePermissionTo('editar pelicula');
        $admin->givePermissionTo('eliminar pelicula');
        $admin->givePermissionTo('crear usuario');
        $admin->givePermissionTo('editar usuario');
        $admin->givePermissionTo('eliminar usuario');
    }
}
