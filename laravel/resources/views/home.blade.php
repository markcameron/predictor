@extends('layouts.app')

@section('content')

  <div class="container">

    <div ng-app="predictor" ng-controller="matchesCtrl">

      <div class="row match" ng-repeat="match in matches">
	<div class="col-xs-5 team text-right">
	  <div class="flex-media flex-media-reverse">
	    <span class="flex-media-figure flag-icon flag-icon-<< match.home_team_code >>"></span>
	    <p class="flex-media-body team-name"><< match.home_team >></p>
	  </div>
	</div>

	<div ng-if="hasResult(match)" class="col-xs-2 result nopadding text-center">
	  << match.score_home >> - << match.score_away >>
	</div>
	<div ng-if="!hasResult(match)" class="col-xs-2 result nopadding text-center">
	  << match.date | date : 'H:mm' >>
	</div>

	<div class="col-xs-5 team">
	  <div class="flex-media">
	    <span class="flex-media-figure flag-icon flag-icon-<< match.away_team_code >>"></span>
	    <div class="flex-media-body team-name"><< match.away_team >></div>
	  </div>
	</div>
      </div>

    </div>

  </div>

@endsection
