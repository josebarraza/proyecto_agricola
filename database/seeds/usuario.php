<?php

use Illuminate\Database\Seeder;

class usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
      DB::table('users')->insert([
        	'nombre' => 'JOSE',
        	'apellido_pat' => 'Barraza',
        	'apellido_mat' => 'Duarte',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin'),
        	'tipo' => 2
        	]);
       
    }
}
