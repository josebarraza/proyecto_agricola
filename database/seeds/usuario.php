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
        	'nombre' => 'Lupita',
        	'apellido_pat' => 'Guerrero',
        	'apellido_mat' => 'Gutierrez',
        	'email' => 'admin2@admin.com',
        	'password' => bcrypt('admin2'),
        	'tipo' => 2
        	]);
    }
}
