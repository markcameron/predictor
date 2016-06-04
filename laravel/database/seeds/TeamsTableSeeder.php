<?php

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Group;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class TeamsTableSeeder extends Seeder {

  public function run() {
    if (Team::count()) {
      return;
    }

    $teams = [
      'A' => [
        [
          'name' => 'France',
          'code' => 'fr',
        ],
        [
          'name' => 'Romania',
          'code' => 'ro',
        ],
        [
          'name' => 'Albania',
          'code' => 'al',
        ],
        [
          'name' => 'Switzerland',
          'code' => 'ch',
        ],
      ],
      'B' => [
        [
          'name' => 'England',
          'code' => 'gb-eng',
        ],
        [
          'name' => 'Russia',
          'code' => 'ru',
        ],
        [
          'name' => 'Wales',
          'code' => 'gb-wls',
        ],
        [
          'name' => 'Slovakia',
          'code' => 'sk',
        ],
      ],
      'C' => [
        [
          'name' => 'Germany',
          'code' => 'de',
        ],
        [
          'name' => 'Ukraine',
          'code' => 'ua',
        ],
        [
          'name' => 'Poland',
          'code' => 'pl',
        ],
        [
          'name' => 'Northern Ireland',
          'code' => 'gb-nir',
        ],
      ],
      'D' => [
        [
          'name' => 'Spain',
          'code' => 'es',
        ],
        [
          'name' => 'Czech Republic',
          'code' => 'cz',
        ],
        [
          'name' => 'Turkey',
          'code' => 'tr',
        ],
        [
          'name' => 'Croatia',
          'code' => 'hr',
        ],
      ],
      'E' => [
        [
          'name' => 'Belgium',
          'code' => 'be',
        ],
        [
          'name' => 'Italy',
          'code' => 'it',
        ],
        [
          'name' => 'Republic of Ireland',
          'code' => 'ie',
        ],
        [
          'name' => 'Sweden',
          'code' => 'se',
        ],
      ],
      'F' => [
        [
          'name' => 'Portugal',
          'code' => 'pt',
        ],
        [
          'name' => 'Iceland',
          'code' => 'is',
        ],
        [
          'name' => 'Austria',
          'code' => 'at',
        ],
        [
          'name' => 'Hungary',
          'code' => 'hu',
        ],
      ],
    ];

    foreach ($teams as $group => $teams) {
      $group = Group::whereName($group)->first();

      foreach ($teams as $team) {
        $team = Team::create(
          [
            'name' => $team['name'],
            'code' => $team['code'],
            'group_id' => $group->id,
          ]
        );
      }
    }

  }

}
