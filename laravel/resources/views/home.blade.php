@extends('layouts.app')

@section('content')

  <script type="text/javascript">
   var user = JSON.parse('<?php echo $user ?>');
  </script>

  <div ng-app="predictor" ng-controller="mainCtrl" ng-strict-di>

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

            <div ng-if="!canPredict(match)" class="col-xs-2 result nopadding text-center">
              <div ng-if="match.score_home != null && match.score_away != null"><< match.score_home >> - << match.score_away >></div>
              <div ng-if="match.score_home == null && match.score_away == null">¯\_(ツ)_/¯</div>
            </div>
            <div ng-if="canPredict(match)" class="col-xs-2 result nopadding text-center">
              <a href="" class="btn btn-action btn-flat btn-sm">Add</a>
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
              <div class="col-xs-4"><a href="" class="btn btn-action" ng-click="decreaseScore('home')"> - </a></div>
              <div class="col-xs-4 score score-home"><< score_home >></div>
              <div class="col-xs-4"><a href="" class="btn btn-action" ng-click="increaseScore('home')"> + </a></div>
            </div>
            <div class="row score-select text-center">
              <div class="col-xs-4"><a href="" class="btn btn-action" ng-click="decreaseScore('away')"> - </a></div>
              <div class="col-xs-4 score"><< score_away >></div>
              <div class="col-xs-4"><a href="" class="btn btn-action" ng-click="increaseScore('away')"> + </a></div>
            </div>
            <div class="row team-name">
              <div class="flex-media flex-media">
                <span class="flex-media-figure flag-icon flag-icon-<< match.away_team_code >>"></span>
                <p class="flex-media-body "><< match.away_team >></p>
              </div>
            </div>
	    <div ng-if="match.is_ko_stage" class="row ko-stage-help">
	      <p><small>NOTE: Your prediction will be the result of the match after 90 mins, if there is a winner, or after 120 minutes if there was a draw at 90. If you predict a draw after 120 minutes, you enter that result and <strong>not</strong> the result counting penalties.</small></p>
	    </div>
          </div>
          <div class="ngdialog-buttons mt">
            <div class="col-xs-6">
              <a href="" class="btn btn-cancel" ng-click="closeThisDialog()">Cancel</a>
            </div>
            <div class="col-xs-6">
              <a href="" class="btn btn-action" ng-click="saveScore()">Save</a>
            </div>
          </div>
        </script>

      </v-page>

      <v-page>
        <div class="container" ng-controller="matchesCtrl">

          <v-accordion id="accordionA" class="vAccordion--default">

            <v-pane class="row match results" ng-repeat="match in matches">
              <v-pane-header>
                <div class="match-result">
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
                    <div class="row date date-day"><< match.date | date : 'MMM d' >></div>
                    <div class="row date date-time"><< match.date | date : 'H:mm' >></div>
                  </div>

                  <div class="col-xs-5 team">
                    <div class="flex-media">
                      <span class="flex-media-figure flag-icon flag-icon-<< match.away_team_code >>"></span>
                      <div class="flex-media-body team-name"><< match.away_team >></div>
                    </div>
                  </div>
                </div>
              </v-pane-header>

              <v-pane-content class="match-detail">
		              <v-tabs ng-show="match.can_predict == 0" class="vTabs--default" horizontal control="matchTabs" active="matchTabs.active">
                  <v-tab>Predictions</v-tab>
                  <v-tab>Goals</v-tab>
                </v-tabs>

                <v-pages ng-show="match.can_predict == 0" class="vPages--default" active="matchTabs.active">

                  <v-page>

                    <div class="container user-predictions">
                      <div class="" ng-repeat="prediction in match.predictions">
                        <div class="col-xs-9">
                          << prediction.user >>
                        </div>
                        <div class="col-xs-3">
                          << prediction.score_home >> - << prediction.score_away >>
                        </div>
                      </div>
                    </div>

                  </v-page>

                  <v-page>
                    <div class="">
                      <div class="row goals">
                        <div class="col-xs-6">
                          <div class="goal text-right" ng-repeat="goal in match.goals_home">
                            <span ng-if="goal.link">
                              <a href="<< goal.link >>">
                                << goal.scored_by >>
                              </a ng-if="goal.link">
                              - << goal.minute >>
                            </span>
                            <span ng-if="!goal.link">
                              << goal.scored_by >> - << goal.minute >>
                            </span>
                          </div>
                        </div>
                        <div class="col-xs-6">
                          <div class="goal" ng-repeat="goal in match.goals_away">
			    <span ng-if="goal.link">
                              << goal.minute >> -
			      <a href="<< goal.link >>">
				<< goal.scored_by >>
                              </a ng-if="goal.link">
			    </span>
                            <span ng-if="!goal.link">
                              << goal.minute >> - << goal.scored_by >>
                            </span>
                          </div>
                        </div>

                      </div>
                    </div>
                  </v-page>

                </v-pages>
              </v-pane-content>
            </v-pane>

          </v-accordion>


        </div>
      </v-page>

      <v-page class="leaderboards-page">

        <div class="container leaderboards" ng-controller="leaderboardCtrl">

          <table class="table text-center">
            <thead>
              <th></th>
              <th></th>
              <th class="text-center">ES</th>
              <th class="text-center">GD</th>
              <th class="text-center">W</th>
              <th class="text-center">Total</th>
            </thead>
            <tr ng-repeat="user in leaderboard">
              <td class="text-right"><< $index + 1 >>.</td>
              <td class="text-left"><< user.full_name >></td>
              <td><< user.exact_score >></td>
              <td><< user.correct_goal_difference >></td>
              <td><< user.correct_winner >></td>
              <td><strong><< user.score >></strong></td>
            </tr>
          </table>

        </div>

      </v-page>

    </v-pages>

  </div>

@endsection
