@extends('layouts.app')

@section('content')

  <div ng-app="predictor" ng-controller="mainCtrl">

    <v-tabs class="vTabs--default" horizontal control="mainMenuTabs" active="mainMenuTabs.active">
      <v-tab>Results</v-tab>
      <v-tab class="my-predictions">My Predictions</v-tab>
      <v-tab>Leaderboard</v-tab>
    </v-tabs>

    <v-pages class="vPages--default"  ng-swipe-left="mainMenuTabs.next()" ng-swipe-right="mainMenuTabs.previous()" active="mainMenuTabs.active">
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
        <h3>Page 2</h3>
        <p>Maecenas malesuada elit lectus felis, malesuada ultricies.</p>
      </v-page>
      <v-page>
        <h3>Page 3</h3>
        <p>Curabitur et ligula. Ut molestie a, ultricies porta urna.</p>
      </v-page>
    </v-pages>

  </div>

@endsection
