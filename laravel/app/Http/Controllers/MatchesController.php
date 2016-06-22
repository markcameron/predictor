<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Match;
use Response;
use App\Http\Controllers\AuthenticatedController;

class MatchesController extends AuthenticatedController {

  /**
   * init Class
   */
  function __construct() {
    parent::__construct();
  }

  /**
   * Retrieve all the matches
   *
   * @return json
   */
  public function index() {
    $matches = Match::orderBy('date', 'DESC')->get();

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
   * Insert the users predictions for the match score over the match object
   *
   * @param object $match
   * The match Eloquent collection
   *
   * @return
   */
  protected function cleanMatch($match) {
    $clean_match = parent::cleanMatch($match);

    $clean_match->goals_home = $this->getGoals($match, 'home');
    $clean_match->goals_away = $this->getGoals($match, 'away');
    $clean_match->predictions = $this->getPredictions($match);

    return $clean_match;
  }


  /**
   * Helper function to create a clean match object from the different relations
   *
   * @param object $match
   * The match Eloquent collection
   *
   * @return
   */
  protected function getGoals($match, $team) {
    $goals = [];

    $method = 'goals'. ucfirst($team);

    foreach ($match->$method as $goal) {
      $goals[] = [
        'minute' => $goal->minute,
        'scored_by' => $goal->scored_by,
        'link' => $goal->link,
      ];
    }

    return $goals;
  }

  protected function getPredictions($match) {
    $predictions = [];

    foreach ($match->predictions as $prediction) {
      $predictions[] = [
        'user' => $prediction->user->full_name,
        'score_home' => $prediction->score_home,
        'score_away' => $prediction->score_away,
      ];
    }

    return $predictions;
  }

}
