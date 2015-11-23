<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call('usuario');
         $this->call('modos_llegada');
         $this->call('Paises');
         $this->call('Estados');
         $this->call('Ciudades');

        Model::reguard();
    }
}
