<?php

use Illuminate\Database\Seeder;
use App\Models\Match;
use App\Models\Stadium;
use App\Models\Team;
use Carbon\Carbon;

class EigthFinalsSeederTableSeeder extends Seeder {

  public function run() {
    if (Match::count() > 36) {
      return;
    }

    $teams = Team::get();
    $stadiums = Stadium::get();
    $matches = [
      [
        'home_team_id' => $teams->where('name', 'Switzerland')->first()->id,
        'away_team_id' => $teams->where('name', 'Poland')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Stade Geoffroy-Guichard')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 6, 25, 13, 0, 0, 'UTC')->toDateTimeString(),
      ],
      [
        'home_team_id' => $teams->where('name', 'Wales')->first()->id,
        'away_team_id' => $teams->where('name', 'Northern Ireland')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Parc des Princes')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 6, 25, 16, 0, 0, 'UTC')->toDateTimeString(),
      ],
      [
        'home_team_id' => $teams->where('name', 'Croatia')->first()->id,
        'away_team_id' => $teams->where('name', 'Portugal')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Stade Bollaert-Delelis')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 6, 25, 19, 0, 0, 'UTC')->toDateTimeString(),
      ],
      [
        'home_team_id' => $teams->where('name', 'France')->first()->id,
        'away_team_id' => $teams->where('name', 'Republic of Ireland')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Stade des Lumières')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 6, 26, 13, 0, 0, 'UTC')->toDateTimeString(),
      ],
      [
        'home_team_id' => $teams->where('name', 'Germany')->first()->id,
        'away_team_id' => $teams->where('name', 'Slovakia')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Stade Pierre-Mauroy')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 6, 26, 16, 0, 0, 'UTC')->toDateTimeString(),
      ],
      [
        'home_team_id' => $teams->where('name', 'Hungary')->first()->id,
        'away_team_id' => $teams->where('name', 'Belgium')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Stadium Municipal')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 6, 26, 19, 0, 0, 'UTC')->toDateTimeString(),
      ],
      [
        'home_team_id' => $teams->where('name', 'Italy')->first()->id,
        'away_team_id' => $teams->where('name', 'Spain')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Stade de France')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 6, 27, 16, 0, 0, 'UTC')->toDateTimeString(),
      ],
      [
        'home_team_id' => $teams->where('name', 'England')->first()->id,
        'away_team_id' => $teams->where('name', 'Iceland')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Allianz Riviera')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 6, 27, 19, 0, 0, 'UTC')->toDateTimeString(),
      ],
    ];

    foreach ($matches as $match) {
      Match::create($match);
    }
  }

}
