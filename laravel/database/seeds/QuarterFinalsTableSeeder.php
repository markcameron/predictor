<?php

use Illuminate\Database\Seeder;
use App\Models\Match;
use App\Models\Stadium;
use App\Models\Team;
use Carbon\Carbon;

class QuarterFinalsTableSeeder extends Seeder {

  public function run() {
    if (Match::count() > 44) {
      return;
    }

    $teams = Team::get();
    $stadiums = Stadium::get();
    $matches = [
      [
        'home_team_id' => $teams->where('name', 'Poland')->first()->id,
        'away_team_id' => $teams->where('name', 'Portugal')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Stade Vélodrome')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 6, 30, 19, 0, 0, 'UTC')->toDateTimeString(),
      ],
      [
        'home_team_id' => $teams->where('name', 'Wales')->first()->id,
        'away_team_id' => $teams->where('name', 'Belgium')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Stade Pierre-Mauroy')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 7, 1, 19, 0, 0, 'UTC')->toDateTimeString(),
      ],
      [
        'home_team_id' => $teams->where('name', 'Germany')->first()->id,
        'away_team_id' => $teams->where('name', 'Italy')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Nouveau Stade de Bordeaux')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 7, 2, 19, 0, 0, 'UTC')->toDateTimeString(),
      ],
      [
        'home_team_id' => $teams->where('name', 'France')->first()->id,
        'away_team_id' => $teams->where('name', 'Iceland')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Stade de France')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 7, 3, 19, 0, 0, 'UTC')->toDateTimeString(),
      ],
    ];

    foreach ($matches as $match) {
      Match::create($match);
    }
  }

}
