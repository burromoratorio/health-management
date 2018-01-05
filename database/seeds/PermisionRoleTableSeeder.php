<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\PermissionRole;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Obtengo datos del super admin
        $SuperAdmin = Role::where("name", "super-user")->first();

        //Obtengo todos los Permisos
        $permisos = Permission::all();

        $permissionRole = [];

        foreach ($permisos as $key => $value) {
            PermissionRole::firstOrCreate( [ 'permission_id' => $value->id, 'role_id' => $SuperAdmin->id ] );
        }

    }
}
