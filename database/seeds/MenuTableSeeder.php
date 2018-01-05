<?php

use Illuminate\Database\Seeder;
use App\Module;
use App\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulos = Module::all();

        $crud_id = $modulos->where("name", "crud")->first()->id;

        foreach ( $modulos as $key => $value ) {

            if ( $value->name == 'crud' ||
                 $value->name == 'profesionales' ||
                 $value->name == 'gerencia' ||
                 $value->name == 'pacientes' ||
                 $value->name == 'turnos' ||
                 $value->name == 'administracion' ||
                 $value->name == 'asesor' ||
                 $value->name == 'hc' )
             {
                 Menu::firstOrCreate( [ 'modulo_id' => $value->id ] );
             } else {
                 Menu::firstOrCreate( [ 'modulo_id' => $value->id, 'parent_id' => $crud_id, 'nivel' => 1 ] );
             }
        }
    }
}
