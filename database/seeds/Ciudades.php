<?php

use Illuminate\Database\Seeder;

class Ciudades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Sinaloa-Municipios
      DB::table('ciudades')->insert([
        'id' => '1',
        'ciudad' => 'Culiacán',
        'id_estado' => '1'
      ]);
      DB::table('ciudades')->insert([
        'id' => '2',
        'ciudad' => 'Mazatlán',
        'id_estado' => '1'
      ]);
      DB::table('ciudades')->insert([
        'id' => '3',
        'ciudad' => 'Navolato',
        'id_estado' => '1'
      ]);

      //Sonora-ciudades
      DB::table('ciudades')->insert([
        'id' => '4',
        'ciudad' => 'Hermosillo',
        'id_estado' => '2'
      ]);
      DB::table('ciudades')->insert([
        'id' => '5',
        'ciudad' => 'Guaymas',
        'id_estado' => '2'
      ]);
      DB::table('ciudades')->insert([
        'id' => '6',
        'ciudad' => 'Navojoa',
        'id_estado' => '2'
      ]);

      //Chihuahua-Municipios
      DB::table('ciudades')->insert([
        'id' => '7',
        'ciudad' => 'Chihuahua',
        'id_estado' => '3'
      ]);
      DB::table('ciudades')->insert([
        'id' => '8',
        'ciudad' => 'Camargo',
        'id_estado' => '3'
      ]);
      DB::table('ciudades')->insert([
        'id' => '9',
        'ciudad' => 'Delicias',
        'id_estado' => '3'
      ]);

      //Buenos aires provincias

      DB::table('ciudades')->insert([
        'id' => '10',
        'ciudad' => 'La Plata',
        'id_estado' => '4'
      ]);
      DB::table('ciudades')->insert([
        'id' => '11',
        'ciudad' => 'Lobos',
        'id_estado' => '4'
      ]);
      DB::table('ciudades')->insert([
        'id' => '12',
        'ciudad' => 'Los Polvorines',
        'id_estado' => '4'
      ]);

      //Catamarca provincias

      DB::table('ciudades')->insert([
        'id' => '13',
        'ciudad' => 'La Puerta',
        'id_estado' => '5'
      ]);
      DB::table('ciudades')->insert([
        'id' => '14',
        'ciudad' => 'Tinogasta',
        'id_estado' => '5'
      ]);
      DB::table('ciudades')->insert([
        'id' => '15',
        'ciudad' => 'La Paz',
        'id_estado' => '5'
      ]);

      //Santa Fe provincias

      DB::table('ciudades')->insert([
        'id' => '16',
        'ciudad' => 'Berabevú',
        'id_estado' => '6'
      ]);
      DB::table('ciudades')->insert([
        'id' => '17',
        'ciudad' => 'Cayastá',
        'id_estado' => '6'
      ]);
      DB::table('ciudades')->insert([
        'id' => '18',
        'ciudad' => 'Serodino',
        'id_estado' => '6'
      ]);

      DB::table('ciudades')->insert([
        'id' => '19',
        'ciudad' => 'Libertador',
        'id_estado' => '7'
      ]);
      DB::table('ciudades')->insert([
        'id' => '20',
        'ciudad' => 'Sucre',
        'id_estado' => '7'
      ]);
      DB::table('ciudades')->insert([
        'id' => '21',
        'ciudad' => 'Baruta',
        'id_estado' => '7'
      ]);

      DB::table('ciudades')->insert([
        'id' => '22',
        'ciudad' => 'Santa Cecilia',
        'id_estado' => '8'
      ]);
      DB::table('ciudades')->insert([
        'id' => '23',
        'ciudad' => 'Los Surcos',
        'id_estado' => '8'
      ]);
      DB::table('ciudades')->insert([
        'id' => '24',
        'ciudad' => 'La Perla',
        'id_estado' => '8'
      ]);

      DB::table('ciudades')->insert([
        'id' => '25',
        'ciudad' => 'Catarina',
        'id_estado' => '9'
      ]);
      DB::table('ciudades')->insert([
        'id' => '26',
        'ciudad' => 'La Paz',
        'id_estado' => '9'
      ]);
      DB::table('ciudades')->insert([
        'id' => '27',
        'ciudad' => 'Ciodelia',
        'id_estado' => '9'
      ]);
    }
}
