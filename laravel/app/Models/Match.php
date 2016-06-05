<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model {

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

  public function predictions() {
    return $this->hasMany('App\Models\Prediction');
  }

  public function userPrediction() {
    return $this->hasMany('App\Models\Prediction')->whereUserId(\Auth::user()->id);
  }

}
