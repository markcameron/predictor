<?php namespace App\Http\Controllers;

use Auth;

class AuthenticatedController extends Controller {

  protected $user;

  function __construct() {
    $this->middleware('auth');

    $this->user = Auth::user();
  }

  /**
   * Helper function to create a clean match object from the different relations
   *
   * @param object $match
   * The match Eloquent collection
   *
   * @return
   */
  protected function cleanMatch($match) {
    return (object) [
      'id' => $match->id,
      'can_predict' => $match->can_predict,
      'is_ko_stage' => $match->is_ko_stage,
      'home_team' => $match->teamHome->name,
      'home_team_code' => $match->teamHome->code,
      'score_home' => $match->score_home,
      'away_team' => $match->teamAway->name,
      'away_team_code' => $match->teamAway->code,
      'score_away' => $match->score_away,
      'stadium_name' => $match->stadium->name,
      'stadium_city' => $match->stadium->city,
      'date' => $match->date->timezone('Europe/Paris')->toIso8601String(),
    ];
  }

}