<?php

use Illuminate\Database\Seeder;
use App\Models\Stadium;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class StadiumsTableSeeder extends Seeder
{

    public function run()
    {
      if (Stadium::count()) {
        return;
      }

      $stadiums = [
        [
          'name' => 'Stade de France',
          'city' => 'Paris',
        ],
        [
          'name' => 'Stade Bollaert-Delelis',
          'city' => 'Lens',
        ],
        [
          'name' => 'Nouveau Stade de Bordeaux',
          'city' => 'Bordeaux',
        ],
        [
          'name' => 'Stade Vélodrome',
          'city' => 'Marseille',
        ],
        [
          'name' => 'Parc des Princes',
          'city' => 'Paris',
        ],
        [
          'name' => 'Allianz Riviera',
          'city' => 'Nice',
        ],
        [
          'name' => 'Stade Pierre-Mauroy',
          'city' => 'Lille',
        ],
        [
          'name' => 'Stadium Municipal',
          'city' => 'Toulouse',
        ],
        [
          'name' => 'Stade des Lumières',
          'city' => 'Lyon',
        ],
        [
          'name' => 'Stade Geoffroy-Guichard',
          'city' => 'Saint-Étienne',
        ],
      ];


      foreach ($stadiums as $stadium) {
        Stadium::create($stadium);
      }
    }

}
