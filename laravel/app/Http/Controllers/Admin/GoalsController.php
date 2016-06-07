<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Match;
use App\Models\Goal;
use Response;
use App\Http\Controllers\AuthenticatedController;

class GoalsController extends AuthenticatedController {

  /**
   * init Class
   */
  function __construct() {
    parent::__construct();

    $this->middleware('admin');
  }

  /**
   * Edit a match to add goals
   *
   * @param Request $request
   * The request object to retrieve GET params
   *
   * @return json
   */
  public function create(Request $request) {
    return view('admin.goals.create')
      ->withRequest($request);
  }

  /**
   * Edit a match to add goals
   *
   * @param int $id
   * The match ID
   *
   * @return json
   */
  public function store(Request $request) {
    Goal::create($request->only('match_id', 'team', 'minute', 'scored_by', 'link'));

    return redirect(route('admin.matches.edit', $request->match_id));
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
    $match = Goal::findOrFail($id);

    return view('goals.edit')
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
    $match = Goal::findOrFail($id);

    $match->update($request->only('score_home', 'score_away'));

    return view('goals.edit')
      ->withMatch($match);
  }

}
