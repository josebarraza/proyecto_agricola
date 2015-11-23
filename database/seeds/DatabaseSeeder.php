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

<<<<<<< HEAD
         //$this->call('usuario');
         //$this->call('modos_llegada');
=======
<<<<<<< HEAD
         $this->call('usuario');
         $this->call('modos_llegada');
         $this->call('Paises');
         $this->call('Estados');
         $this->call('Ciudades');
=======
         //$this->call('usuario');
         //$this->call('modos_llegada');
>>>>>>> cd188cd67346e8570197a78f0ed50a45764d9d3e
>>>>>>> e7f121c587915b129da361d3765c87a45398b57c

        Model::reguard();
    }
}
