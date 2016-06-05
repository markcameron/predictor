@extends('layouts.app')

@section('content')

  <div ng-app="predictor" ng-controller="mainCtrl">

    <v-tabs class="vTabs--default" horizontal control="mainMenuTabs" active="mainMenuTabs.active">
      <v-tab class="my-predictions">My Predictions</v-tab>
      <v-tab>Results</v-tab>
      <v-tab>Leaderboard</v-tab>
    </v-tabs>

    <v-pages class="vPages--default"  ng-swipe-left="mainMenuTabs.next()" ng-swipe-right="mainMenuTabs.previous()" active="mainMenuTabs.active">
      <v-page>
        <div class="container" ng-controller="predictionsCtrl">

          <div class="row match" ng-click="openPrediction(match)" ng-repeat="match in predictions">
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
              <a href="#" class="btn btn-success btn-flat btn-sm">Add</a>
            </div>

            <div class="col-xs-5 team">
              <div class="flex-media">
                <span class="flex-media-figure flag-icon flag-icon-<< match.away_team_code >>"></span>
                <div class="flex-media-body team-name"><< match.away_team >></div>
              </div>
            </div>
          </div>

        </div>

        <script type="text/ng-template" id="dialogPrediction">
          <div class="ngdialog-message">
            <div class="row team-name">
              <div class="flex-media flex-media">
                <span class="flex-media-figure flag-icon flag-icon-<< match.home_team_code >>"></span>
                <p class="flex-media-body "><< match.home_team >></p>
              </div>
            </div>
            <div class="row score-select text-center">
              <div class="col-xs-4"><a href="" class="btn btn-warning" ng-click="decreaseScore('home')"> - </a></div>
              <div class="col-xs-4 score score-home"><< match.score_home >></div>
              <div class="col-xs-4"><a href="" class="btn btn-success" ng-click="increaseScore('home')"> + </a></div>
            </div>
            <div class="row score-select text-center">
              <div class="col-xs-4"><a href="" class="btn btn-warning" ng-click="decreaseScore('away')"> - </a></div>
              <div class="col-xs-4 score"><< match.score_away >></div>
              <div class="col-xs-4"><a href="" class="btn btn-success" ng-click="increaseScore('away')"> + </a></div>
            </div>
            <div class="row team-name">
              <div class="flex-media flex-media">
                <span class="flex-media-figure flag-icon flag-icon-<< match.away_team_code >>"></span>
                <p class="flex-media-body "><< match.away_team >></p>
              </div>
            </div>
          </div>
          <div class="ngdialog-buttons mt">
            <button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="saveScore()">Save</button>
            <button type="button" class="ngdialog-button ngdialog-button-secondary" ng-click="closeThisDialog()">Cancel</button>
          </div>
        </script>

      </v-page>

      <v-page>
        <div class="container" ng-controller="matchesCtrl">

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
      </v-page>

      <v-page>

        <div class="container" ng-controller="leaderboardCtrl">

          <div class="col-xs-12" ng-repeat="user in leaderboard">
            <div class="row">
	      <div class="col-xs-9">
		<< user.full_name >>
	      </div>
	      <div class="col-xs-3">
		<< user.score >>
	      </div>
            </div>
          </div>

        </div>

      </v-page>

    </v-pages>

  </div>

@endsection
