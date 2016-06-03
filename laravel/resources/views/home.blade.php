@extends('layouts.app')

@section('content')

  <div class="container">

    <div ng-app="predictor" ng-controller="matchesCtrl">

      <div class="row" ng-repeat="match in matches">
	<div class="col-xs-1">
	  << match.home_team_code >>
	</div>
	<div class="col-xs-4">
	  << match.home_team >>
	</div>
	<div class="col-xs-2">
	  << match.score_home >> - << match.score_away >>
	</div>
	<div class="col-xs-4">
	  << match.away_team >>
	</div>
	<div class="col-xs-1">
	  << match.away_team_code >>
	</div>
      </div>

    </div>

  </div>

@endsection
