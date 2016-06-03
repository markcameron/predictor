<?php

use Illuminate\Database\Seeder;
use App\Models\Match;
use App\Models\Stadium;
use App\Models\Team;
use Carbon\Carbon;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class MatchesTableSeeder extends Seeder {

    public function run() {
      if (Match::count()) {
        return;
      }

      $teams = Team::get();
      $stadiums = Stadium::get();
      $matches = [
        // Round 1
        [
          'home_team_id' => $teams->where('name', 'France')->first()->id,
          'away_team_id' => $teams->where('name', 'Romania')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade de France')->first()->id,
          'date' => Carbon::create(2016, 6, 10, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],

        [
          'home_team_id' => $teams->where('name', 'Albania')->first()->id,
          'away_team_id' => $teams->where('name', 'Switzerland')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Bollaert-Delelis')->first()->id,
          'date' => Carbon::create(2016, 6, 11, 13, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Wales')->first()->id,
          'away_team_id' => $teams->where('name', 'Slovakia')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Nouveau Stade de Bordeaux')->first()->id,
          'date' => Carbon::create(2016, 6, 11, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'England')->first()->id,
          'away_team_id' => $teams->where('name', 'Russia')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Vélodrome')->first()->id,
          'date' => Carbon::create(2016, 6, 11, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],

        [
          'home_team_id' => $teams->where('name', 'Turkey')->first()->id,
          'away_team_id' => $teams->where('name', 'Croatia')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Parc des Princes')->first()->id,
          'date' => Carbon::create(2016, 6, 12, 13, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Poland')->first()->id,
          'away_team_id' => $teams->where('name', 'Northern Ireland')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Parc des Princes')->first()->id,
          'date' => Carbon::create(2016, 6, 12, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Germany')->first()->id,
          'away_team_id' => $teams->where('name', 'Ukraine')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Pierre-Mauroy')->first()->id,
          'date' => Carbon::create(2016, 6, 12, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],

        [
          'home_team_id' => $teams->where('name', 'Spain')->first()->id,
          'away_team_id' => $teams->where('name', 'Czech Republic')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stadium Municipal')->first()->id,
          'date' => Carbon::create(2016, 6, 13, 13, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Republic of Ireland')->first()->id,
          'away_team_id' => $teams->where('name', 'Sweden')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade de France')->first()->id,
          'date' => Carbon::create(2016, 6, 13, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Belgium')->first()->id,
          'away_team_id' => $teams->where('name', 'Italy')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade des Lumières')->first()->id,
          'date' => Carbon::create(2016, 6, 13, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],

        [
          'home_team_id' => $teams->where('name', 'Austria')->first()->id,
          'away_team_id' => $teams->where('name', 'Hungary')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Nouveau Stade de Bordeaux')->first()->id,
          'date' => Carbon::create(2016, 6, 14, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Portugal')->first()->id,
          'away_team_id' => $teams->where('name', 'Iceland')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Geoffroy-Guichard')->first()->id,
          'date' => Carbon::create(2016, 6, 14, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],
        // Round 2
        [
          'home_team_id' => $teams->where('name', 'Russia')->first()->id,
          'away_team_id' => $teams->where('name', 'Slovakia')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Pierre-Mauroy')->first()->id,
          'date' => Carbon::create(2016, 6, 15, 13, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Romania')->first()->id,
          'away_team_id' => $teams->where('name', 'Switzerland')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Parc des Princes')->first()->id,
          'date' => Carbon::create(2016, 6, 15, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'France')->first()->id,
          'away_team_id' => $teams->where('name', 'Albania')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Vélodrome')->first()->id,
          'date' => Carbon::create(2016, 6, 15, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],


        [
          'home_team_id' => $teams->where('name', 'England')->first()->id,
          'away_team_id' => $teams->where('name', 'Wales')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Bollaert-Delelis')->first()->id,
          'date' => Carbon::create(2016, 6, 16, 13, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Ukraine')->first()->id,
          'away_team_id' => $teams->where('name', 'Northern Ireland')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade des Lumières')->first()->id,
          'date' => Carbon::create(2016, 6, 16, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Germany')->first()->id,
          'away_team_id' => $teams->where('name', 'Poland')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade de France')->first()->id,
          'date' => Carbon::create(2016, 6, 16, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],


        [
          'home_team_id' => $teams->where('name', 'Italy')->first()->id,
          'away_team_id' => $teams->where('name', 'Sweden')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stadium Municipal')->first()->id,
          'date' => Carbon::create(2016, 6, 17, 13, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Czech Republic')->first()->id,
          'away_team_id' => $teams->where('name', 'Croatia')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Geoffroy-Guichard')->first()->id,
          'date' => Carbon::create(2016, 6, 17, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Spain')->first()->id,
          'away_team_id' => $teams->where('name', 'Turkey')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Allianz Riviera')->first()->id,
          'date' => Carbon::create(2016, 6, 17, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],


        [
          'home_team_id' => $teams->where('name', 'Belgium')->first()->id,
          'away_team_id' => $teams->where('name', 'Republic of Ireland')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Nouveau Stade de Bordeaux')->first()->id,
          'date' => Carbon::create(2016, 6, 18, 13, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Iceland')->first()->id,
          'away_team_id' => $teams->where('name', 'Hungary')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Vélodrome')->first()->id,
          'date' => Carbon::create(2016, 6, 18, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Portugal')->first()->id,
          'away_team_id' => $teams->where('name', 'Austria')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Parc des Princes')->first()->id,
          'date' => Carbon::create(2016, 6, 18, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],
        // Round 3
        [
          'home_team_id' => $teams->where('name', 'Romania')->first()->id,
          'away_team_id' => $teams->where('name', 'Albania')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade des Lumières')->first()->id,
          'date' => Carbon::create(2016, 6, 19, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Switzerland')->first()->id,
          'away_team_id' => $teams->where('name', 'France')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Pierre-Mauroy')->first()->id,
          'date' => Carbon::create(2016, 6, 19, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],


        [
          'home_team_id' => $teams->where('name', 'Russia')->first()->id,
          'away_team_id' => $teams->where('name', 'Wales')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stadium Municipal')->first()->id,
          'date' => Carbon::create(2016, 6, 20, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Slovakia')->first()->id,
          'away_team_id' => $teams->where('name', 'England')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Geoffroy-Guichard')->first()->id,
          'date' => Carbon::create(2016, 6, 20, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],


        [
          'home_team_id' => $teams->where('name', 'Ukraine')->first()->id,
          'away_team_id' => $teams->where('name', 'Poland')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Vélodrome')->first()->id,
          'date' => Carbon::create(2016, 6, 21, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Northern Ireland')->first()->id,
          'away_team_id' => $teams->where('name', 'Germany')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Parc des Princes')->first()->id,
          'date' => Carbon::create(2016, 6, 21, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],


        [
          'home_team_id' => $teams->where('name', 'Czech Republic')->first()->id,
          'away_team_id' => $teams->where('name', 'Turkey')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Bollaert-Delelis')->first()->id,
          'date' => Carbon::create(2016, 6, 21, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Croatia')->first()->id,
          'away_team_id' => $teams->where('name', 'Spain')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Nouveau Stade de Bordeaux')->first()->id,
          'date' => Carbon::create(2016, 6, 21, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],


        [
          'home_team_id' => $teams->where('name', 'Iceland')->first()->id,
          'away_team_id' => $teams->where('name', 'Austria')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade de France')->first()->id,
          'date' => Carbon::create(2016, 6, 22, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Hungary')->first()->id,
          'away_team_id' => $teams->where('name', 'Portugal')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade des Lumières')->first()->id,
          'date' => Carbon::create(2016, 6, 22, 16, 0, 0, 'UTC')->toDateTimeString(),
        ],


        [
          'home_team_id' => $teams->where('name', 'Italy')->first()->id,
          'away_team_id' => $teams->where('name', 'Republic of Ireland')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Stade Pierre-Mauroy')->first()->id,
          'date' => Carbon::create(2016, 6, 22, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],
        [
          'home_team_id' => $teams->where('name', 'Sweden')->first()->id,
          'away_team_id' => $teams->where('name', 'Belgium')->first()->id,
          'stadium_id' => $stadiums->where('name', 'Allianz Riviera')->first()->id,
          'date' => Carbon::create(2016, 6, 22, 19, 0, 0, 'UTC')->toDateTimeString(),
        ],
      ];

      foreach ($matches as $match) {
        Match::create($match);
      }
    }

}
