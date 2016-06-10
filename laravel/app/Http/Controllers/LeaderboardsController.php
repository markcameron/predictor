<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use Response;
use App\Http\Requests\SubmitPredictionRequest;
use App\Http\Controllers\AuthenticatedController;

class LeaderboardsController extends AuthenticatedController {

  const POINTS_CORRECT_SCORE = 5;
  const POINTS_CORRECT_DIFFERENCE = 3;
  const POINTS_CORRECT_WINNER = 1;

  protected $score;

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
        $this->calculateScore($user);

        return (object) array_merge(
          [
            'full_name' => $user->full_name,
          ], $this->score);
      }
    );

    $leaderboard = $leaderboard->sortByDesc('score');

    return Response::json($leaderboard->values(), 200);
  }

  /**
   * Loop through the users predictions and get their score
   *
   * @param User $user
   *
   * @return void
   */
  protected function calculateScore($user) {
    $this->score = [
      'exact_score' => 0,
      'correct_goal_difference' => 0,
      'correct_winner' => 0,
      'score' => 0,
    ];

//    print_r($user->full_name ."\n");
    foreach ($user->predictions as $prediction) {
      $this->getMatchPoints($prediction);
    }
  }

  /**
   * Check all possible score giving outcomes and return points
   *
   * @param Prediction $prediction
   * The prediction Eloquent object
   *
   * @return int
   * The points that the users gets for the match
   */
  protected function getMatchPoints($prediction) {
    if ($this->predictedCorrectScore($prediction)) {
      $this->score['exact_score']++;
      $this->score['score'] += self::POINTS_CORRECT_SCORE;
      return;
    }

    if ($this->predictedCorrectDifference($prediction)) {
      $this->score['correct_goal_difference']++;
      $this->score['score'] += self::POINTS_CORRECT_DIFFERENCE;
      return;
    }

    if ($this->predictedCorrectWinner($prediction)) {
      $this->score['correct_winner']++;
      $this->score['score'] += self::POINTS_CORRECT_WINNER;
      return;
    }
  }

  /**
   * Check if the user predicted the correct score of the game
   *
   * @param Prediction $prediction
   * The prediction Eloquent object
   *
   * @return bool
   * TRUE if prediction is correct, otherwise FALSE
   */
  protected function predictedCorrectScore($prediction) {
//    print_r($prediction->score_home .":". $prediction->match->score_home ." | ". $prediction->score_away .":". $prediction->match->score_away);

    if ($prediction->score_home === $prediction->match->score_home
        && $prediction->score_away === $prediction->match->score_away) {
//      print_r(" - 5\n");
      return TRUE;
    }

//    print_r("\n");
    return FALSE;
  }

  /**
   * Check if the user predicted the correct goal difference of the game
   *
   * @param Prediction $prediction
   * The prediction Eloquent object
   *
   * @return bool
   * TRUE if prediction is correct, otherwise FALSE
   */
  protected function predictedCorrectDifference($prediction) {
    if (is_null($prediction->match->score_home) && is_null($prediction->match->score_away)) {
      return FALSE;
    }

    $predicted_difference = $prediction->score_home - $prediction->score_away;
    $match_difference = $prediction->match->score_home - $prediction->match->score_away;

//    print_r($predicted_difference ." | ". $match_difference);

    if ($predicted_difference == $match_difference) {
//      print_r(" - 3\n");
      return TRUE;
    }

//    print_r("\n");
    return FALSE;
  }

  /**
   * Check if the user predicted the correct winner of the game
   *
   * @param Prediction $prediction
   * The prediction Eloquent object
   *
   * @return bool
   * TRUE if prediction is correct, otherwise FALSE
   */
  protected function predictedCorrectWinner($prediction) {
    if (is_null($prediction->match->score_home) && is_null($prediction->match->score_away)) {
      return FALSE;
    }

    $predicted_difference = $prediction->score_home - $prediction->score_away;
    $match_difference = $prediction->match->score_home - $prediction->match->score_away;

//    print_r($predicted_difference ." | ". $match_difference);

    if ($predicted_difference < 0 && $match_difference < 0 || $predicted_difference > 0 && $match_difference > 0) {
//      print_r(" - 1\n");
      return TRUE;
    }

//    print_r("\n");
    return FALSE;
  }

}
