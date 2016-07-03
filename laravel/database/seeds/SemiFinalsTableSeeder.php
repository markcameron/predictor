<?php

use Illuminate\Database\Seeder;
use App\Models\Match;
use App\Models\Stadium;
use App\Models\Team;
use Carbon\Carbon;

class SemiFinalsTableSeeder extends Seeder {

  public function run() {
    if (Match::count() > 48) {
      return;
    }

    $teams = Team::get();
    $stadiums = Stadium::get();
    $matches = [
      [
        'home_team_id' => $teams->where('name', 'Portugal')->first()->id,
        'away_team_id' => $teams->where('name', 'Wales')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Stade des Lumières')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 7, 6, 19, 0, 0, 'UTC')->toDateTimeString(),
      ],
      [
        'home_team_id' => $teams->where('name', 'Germany')->first()->id,
        'away_team_id' => $teams->where('name', 'France')->first()->id,
        'stadium_id' => $stadiums->where('name', 'Stade Vélodrome')->first()->id,
        'can_predict' => TRUE,
        'is_ko_stage' => TRUE,
        'date' => Carbon::create(2016, 7, 7, 19, 0, 0, 'UTC')->toDateTimeString(),
      ],
    ];

    foreach ($matches as $match) {
      Match::create($match);
    }
  }

}
