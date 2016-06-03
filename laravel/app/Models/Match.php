<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model {

  protected $hidden = ['team_home', 'team_away', 'created_at', 'updated_at'];

  protected $appends = ['home_team']; //, 'away_team', 'stadium_name'];

  protected $dates = ['date'];

  public function teamHome() {
    return $this->belongsTo('App\Models\Team', 'home_team_id');
  }

  public function teamAway() {
    return $this->belongsTo('App\Models\Team', 'away_team_id');
  }

  public function stadium() {
    return $this->belongsTo('App\Models\Stadium', 'stadium_id');
  }

}
