<?php

use Illuminate\Database\Seeder;

class modos_llegada extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modos')->insert(['modo' => 'Terrestre']);
         DB::table('modos')->insert(['modo' => 'Acuático']);
          DB::table('modos')->insert(['modo' => 'Via tren']);
    }
}
