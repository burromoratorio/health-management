<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\RoleUser;

class RoleUserTableSeeder extends Seeder
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

        $usuarios = User::where("username", "amoratorio")
                        ->get();

        foreach ($usuarios as $key => $value) {
            RoleUser::firstOrCreate( [ 'user_id' => $value->id, 'role_id' => $SuperAdmin->id ] );
        }
    }
}
