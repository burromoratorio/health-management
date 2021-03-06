<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ModuleTableSeeder::class);
         $this->call(MenuTableSeeder::class);
         $this->call(PermissionTableSeeder::class);
         $this->call(RoleTableSeeder::class);
         $this->call(PermissionRoleTableSeeder::class);
         $this->call(RoleUserTableSeeder::class);
        
        
    }
}
