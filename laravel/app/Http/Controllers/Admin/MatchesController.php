<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Match;
use App\Models\Goal;
use Response;
use App\Http\Controllers\AuthenticatedController;

class MatchesController extends AuthenticatedController {

  /**
   * init Class
   */
  function __construct() {
    parent::__construct();

    $this->middleware('admin');
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

    return view('admin.matches.index')
      ->withMatches($matches);
  }

  /**
   * Edit a match to add goals
   *
   * @param int $id
   * The match ID
   *
   * @return json
   */
  public function edit($id) {
    $match = Match::findOrFail($id);

    return view('admin.matches.edit')
      ->withMatch($match);
  }

  /**
   * Edit a match to add goals
   *
   * @param int $id
   * The match ID
   *
   * @return json
   */
  public function update(Request $request, $id) {
    $match = Match::findOrFail($id);

    $match->update($request->only('score_home', 'score_away'));

    return redirect()->back();
  }

}
