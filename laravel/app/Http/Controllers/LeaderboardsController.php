<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use Response;
use App\Http\Requests\SubmitPredictionRequest;
use App\Http\Controllers\AuthenticatedController;

class LeaderboardsController extends AuthenticatedController {

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
    $leaderboard = User::get();

    $leaderboard = $leaderboard->map(
      function($user) {
        return (object) [
          'full_name' => $user->full_name,
          'score' => 0,
        ];
      }
    );

    return Response::json($leaderboard, 200);
  }

}
