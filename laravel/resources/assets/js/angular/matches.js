angular.module('predictor', ['ngAnimate', 'ngTouch', 'vTabs'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<<');
    $interpolateProvider.endSymbol('>>');
})

.controller('mainCtrl', function($scope) {
    $scope.mainMenuTabs = {
        active: 0
    };
})

.controller('matchesCtrl', function($scope, $http) {
    $http({
        method : "GET",
        url : "/matches"
    }).then(function mySucces(response) {
        $scope.matches = response.data;
    }, function myError(response) {
        $scope.matches = response.statusText;
    });

    $scope.hasResult = function(match) {
	if (match.score_home && match.score_away) {
	    return true;
	}

	return false;
    }
});
