<?php

use Illuminate\Database\Seeder;

class Estados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Mexico estados
      DB::table('estados')->insert([
        'id' => '1',
        'estado' => 'Sinaloa',
        'id_pais' => '1'
      ]);
      DB::table('estados')->insert([
        'id' => '2',
        'estado' => 'Sonora',
        'id_pais'=> '1'
      ]);
      DB::table('estados')->insert([
        'id' => '3',
        'estado' => 'Chihuahua',
        'id_pais'=> '1'
      ]);

      //Argentina
      DB::table('estados')->insert([
        'id' => '4',
        'estado' => 'Buenos Aires',
        'id_pais' => '2'
      ]);
      DB::table('estados')->insert([
        'id' => '5',
        'estado' => 'Catamarca',
        'id_pais'=> '2'
      ]);
      DB::table('estados')->insert([
        'id' => '6',
        'estado' => 'Santa Fe',
        'id_pais'=> '2'
      ]);

      //Venezuela
      DB::table('estados')->insert([
        'id' => '7',
        'estado' => 'Caracas',
        'id_pais' => '3'
      ]);
      DB::table('estados')->insert([
        'id' => '8',
        'estado' => 'Zulia',
        'id_pais'=> '3'
      ]);
      DB::table('estados')->insert([
        'id' => '9',
        'estado' => 'Trujillo',
        'id_pais'=> '3'
      ]);
    }
}
