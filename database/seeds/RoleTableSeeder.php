<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [ 'name' => 'super-user', 'display_name' => 'Super Usuario', 'description' => 'Usuario con máximos privilegios' ],
            [ 'name' => 'administrator', 'display_name' => 'Administrador', 'description' => 'Usuario con privilegios administrativos' ],
            [ 'name' => 'user', 'display_name' => 'Usuario', 'description' => 'Usuario con privilegios de acceso básico' ]
        ];

        foreach ($role as $key => $value) {
            Role::firstOrCreate($value);
        }
    }
}
