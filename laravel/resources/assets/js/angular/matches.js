angular.module('predictor', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<<');
    $interpolateProvider.endSymbol('>>');
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
});
