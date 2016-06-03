<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Match;
use Response;

class MatchesController extends Controller {

  /**
   * Retrieve all the matches
   *
   * @return json
   */
  public function index() {
    $matches = Match::get();

    $matches = $matches->map(
      function($match) {
        return $this->cleanMatch($match);
      }
    );

    return Response::json($matches, 200);
  }

  /**
   * Get a single match by id
   *
   * @param int $id
   * The match ID
   *
   * @return json
   */
  public function show($id) {
    $match = Match::whereId($id)
      ->get();

    $match = $match->map(
      function($match) {
        return $this->cleanMatch($match);
      }
    );

    return Response::json($match->first(), 200);
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
      'home_team' => $match->teamHome->name,
      'home_team_code' => $match->teamHome->code,
      'score_home' => $match->score_home,
      'away_team' => $match->teamAway->name,
      'away_team_code' => $match->teamAway->code,
      'score_away' => $match->score_away,
      'stadium_name' => $match->stadium->name,
      'stadium_city' => $match->stadium->city,
      'date' => $match->date->timezone('Europe/Paris')->toDateTimeString(),
    ];
  }

}
