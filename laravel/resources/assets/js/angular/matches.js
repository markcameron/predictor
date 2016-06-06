angular.module('predictor', ['ngAnimate', 'ngTouch', 'ngDialog', 'vTabs'], ["$interpolateProvider", function($interpolateProvider) {
    $interpolateProvider.startSymbol('<<');
    $interpolateProvider.endSymbol('>>');
}])

    .controller('mainCtrl', ["$scope", function($scope) {
        $scope.mainMenuTabs = {
            active: 0
        };

        $scope.hasResult = function(match) {
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

            ngDialog.open({
                template: 'dialogPrediction',
                controller: 'dialogPredictionCtrl',
                className: 'ngdialog-theme-default ngdialog-theme-custom',
		scope: $scope
            });
        };
    }])

    .controller('dialogPredictionCtrl', ["$scope", "$http", "ngDialog", function ($scope, $http, ngDialog) {
	if ($scope.match.score_home == null) {
	    $scope.match.score_home = 0;
	}
	if ($scope.match.score_away == null) {
	    $scope.match.score_away = 0;
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
	    if ($scope.match[key] >= 20) {
		$scope.match[key] = 20;
	    }
	    else {
		$scope.match[key]++;
	    }
	}

	$scope.decreaseScore = function(team) {
	    var key = 'score_' + team;
	    if ($scope.match[key] <= 0) {
		$scope.match[key] = 0;
	    }
	    else {
		$scope.match[key]--;
	    }
	}

	$scope.saveScore = function() {
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
