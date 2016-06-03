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
          'code' => 'FR',
        ],
        [
          'name' => 'Romania',
          'code' => 'RO',
        ],
        [
          'name' => 'Albania',
          'code' => 'AL',
        ],
        [
          'name' => 'Switzerland',
          'code' => 'CH',
        ],
      ],
      'B' => [
        [
          'name' => 'England',
          'code' => 'EN',
        ],
        [
          'name' => 'Russia',
          'code' => 'RU',
        ],
        [
          'name' => 'Wales',
          'code' => 'WA',
        ],
        [
          'name' => 'Slovakia',
          'code' => 'SK',
        ],
      ],
      'C' => [
        [
          'name' => 'Germany',
          'code' => 'DE',
        ],
        [
          'name' => 'Ukraine',
          'code' => 'UA',
        ],
        [
          'name' => 'Poland',
          'code' => 'PL',
        ],
        [
          'name' => 'Northern Ireland',
          'code' => 'NIE',
        ],
      ],
      'D' => [
        [
          'name' => 'Spain',
          'code' => 'ES',
        ],
        [
          'name' => 'Czech Republic',
          'code' => 'CZ',
        ],
        [
          'name' => 'Turkey',
          'code' => 'TR',
        ],
        [
          'name' => 'Croatia',
          'code' => 'HR',
        ],
      ],
      'E' => [
        [
          'name' => 'Belgium',
          'code' => 'BE',
        ],
        [
          'name' => 'Italy',
          'code' => 'IT',
        ],
        [
          'name' => 'Republic of Ireland',
          'code' => 'IE',
        ],
        [
          'name' => 'Sweden',
          'code' => 'SE',
        ],
      ],
      'F' => [
        [
          'name' => 'Portugal',
          'code' => 'PT',
        ],
        [
          'name' => 'Iceland',
          'code' => 'IS',
        ],
        [
          'name' => 'Austria',
          'code' => 'AT',
        ],
        [
          'name' => 'Hungary',
          'code' => 'HU',
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
