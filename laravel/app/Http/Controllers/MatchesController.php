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

}
