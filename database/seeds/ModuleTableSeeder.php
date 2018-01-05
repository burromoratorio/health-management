<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = [
            // MENU PRINCIPAL
        	[
        		'name' => 'crud',
        		'display_name' => 'CRUD',
        		'description' => 'Menu que englobla la gestión de todos los módulos',
                'icon' => 'fa-cog'
        	],
        	[
        		'name' => 'profesionales',
        		'display_name' => 'Profesionales',
        		'description' => 'Menu que englobla la gestión del área del cuerpo medico y profesional',
                'icon' => 'fa-line-chart'
        	],
        	[
        		'name' => 'gerencia',
        		'display_name' => 'Gerencia',
        		'description' => 'Menu que englobla la gestión del área de gerencia',
                'icon' => 'fa-code'
        	],
        	[
        		'name' => 'pacientes',
        		'display_name' => 'Pacientes',
        		'description' => 'Menu que englobla las tareas de gestion de pacientes',
                'icon' => 'fa-lightbulb-o'
        	],
        	[
        		'name' => 'turnos',
        		'display_name' => 'Turnos',
                'description' => 'Menu que englobla la gestión Turnos de la clinica',
                'icon' => 'fa-flask'
        	],
        	[
        		'name' => 'administracion',
        		'display_name' => 'Administracion',
        		'description' => 'Menu que englobla la gestión Administrativa',
                'icon' => 'fa-globe'
        	],
			[
        		'name' => 'asesor',
        		'display_name' => 'Asesor',
        		'description' => 'Menu que englobla la gestión del sector de asesores',
                'icon' => 'fa-globe'
        	],
        	[
        		'name' => 'hc',
        		'display_name' => 'HC',
        		'description' => 'Menu que englobla la gestión Historias Clinicas',
                'icon' => 'fa-globe'
        	],
            //SUBMENU CRUD
        	[
        		'name' => 'usuarios',
        		'display_name' => 'Usuarios',
        		'description' => 'Módulo de creación, edición, eliminado y administración de usuarios',
                'icon' => 'fa-users'
        	],
        	[
        		'name' => 'modulos',
        		'display_name' => 'Módulos',
        		'description' => 'Módulo de creación, edición, eliminado y administración de módulos',
                'icon' => 'fa-cubes'
        	],
        	[
        		'name' => 'permisos',
        		'display_name' => 'Permisos',
        		'description' => 'Módulo de creación, edición, eliminado y administración de permisos',
                'icon' => 'fa-lock'
        	],
        	[
        		'name' => 'roles',
        		'display_name' => 'Roles',
        		'description' => 'Módulo de creación, edición, eliminado y administración de roles',
                'icon' => 'fa-list-alt'
        	],
        	[
        		'name' => 'seguridad',
        		'display_name' => 'Seguridad',
        		'description' => 'Módulo de creación, edición, eliminado y administración de roles',
                'icon' => 'fa-shield'
        	],
        	[
        		'name' => 'menus',
        		'display_name' => 'Menús',
        		'description' => 'Módulo de creación, edición, eliminado y administración de Menús',
                'icon' => 'fa-bars'
        	]

        ];

        foreach ($module as $key => $value) {
        	Module::firstOrCreate($value);
        }
    }
}
