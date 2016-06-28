angular.module('predictor', ['ngAnimate', 'ngTouch', 'ngDialog', 'vTabs', 'vAccordion'], ["$interpolateProvider", function($interpolateProvider) {
    $interpolateProvider.startSymbol('<<');
    $interpolateProvider.endSymbol('>>');
}])

    .config(['$compileProvider', function ($compileProvider) {
	$compileProvider.debugInfoEnabled(false);
    }])

    .controller('mainCtrl', ["$scope", function($scope) {
        $scope.mainMenuTabs = {
            active: 1
        };

        $scope.hasResult = function(match) {
          if (match.can_predict == 0) {
            return true
          }

            if (match.score_home != null && match.score_away != null) {
                return true;
            }

            return false;
        }
    }])

    .controller('matchesCtrl', ["$scope", "$http", function($scope, $http) {
        $http({
            method : "GET",
            url : "/matches"
        }).then(function mySucces(response) {
            $scope.matches = response.data;
        }, function myError(response) {
            $scope.matches = response.statusText;
        });

	$scope.matchTabs = {
            active: 0
        };
    }])

    .controller('predictionsCtrl', ["$scope", "$http", "ngDialog", function($scope, $http, ngDialog) {
        $http({
            method : "GET",
            url : "/predictions"
        }).then(function mySucces(response) {
            $scope.predictions = response.data;
        }, function myError(response) {
            $scope.predictions = response.statusText;
        });

        $scope.openPrediction = function (match) {
	    $scope.match = match;

	    if (user.can_predict != 0 && match.can_predict != 0) {
		ngDialog.open({
                    template: 'dialogPrediction',
                    controller: 'dialogPredictionCtrl',
                    className: 'ngdialog-theme-default ngdialog-theme-custom',
		    scope: $scope
		});
	    }
        };
    }])

    .controller('dialogPredictionCtrl', ["$scope", "$http", "ngDialog", function ($scope, $http, ngDialog) {
	$scope.score_home = $scope.match.score_home;
	$scope.score_away = $scope.match.score_away;

	if ($scope.score_home == null) {
	    $scope.score_home = 0;
	}
	if ($scope.score_away == null) {
	    $scope.score_away = 0;
	}

        $scope.next = function () {
            ngDialog.close('ngdialog1');
            ngDialog.open({
                template: 'secondDialog',
                className: 'ngdialog-theme-flat ngdialog-theme-custom'
            });
        };

	$scope.increaseScore = function(team) {
	    var key = 'score_' + team;
	    if ($scope[key] >= 20) {
		$scope[key] = 20;
	    }
	    else {
		$scope[key]++;
	    }
	}

	$scope.decreaseScore = function(team) {
	    var key = 'score_' + team;
	    if ($scope[key] <= 0) {
		$scope[key] = 0;
	    }
	    else {
		$scope[key]--;
	    }
	}

	$scope.saveScore = function() {
	    $scope.match.score_home = $scope.score_home;
	    $scope.match.score_away = $scope.score_away;

	    $http({
		method : "put",
		url : "/predictions/" + $scope.match.id,
		data : {
		    score_home: $scope.match.score_home,
		    score_away: $scope.match.score_away
		},
            }).then(function mySucces(response) {
		$scope.closeThisDialog();
            }, function myError(response) {
		$scope.predictions = response.statusText;
            });
	}
    }])

    .controller('leaderboardCtrl', ["$scope", "$http", function($scope, $http) {
        $http({
            method : "GET",
            url : "/leaderboards"
        }).then(function mySucces(response) {
            $scope.leaderboard = response.data;
        }, function myError(response) {
            $scope.leaderboard = response.statusText;
        });
    }]);
