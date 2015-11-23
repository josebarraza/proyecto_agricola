<?php

use Illuminate\Database\Seeder;

class Paises extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Mexico
         DB::table('paises')->insert([
           'id' => '1',
           'pais' => 'México',
         ]);

         //Argentina
         DB::table('paises')->insert([
           'id' => '2',
           'pais' => 'Argentina',
         ]);

         //Venezuela
         DB::table('paises')->insert([
           'id' => '3',
           'pais' => 'Venezuela',
         ]);

    }
}
