angular.module('locations', []).controller('myCtrl', function($scope, $http){
	console.log("got here");
  	$http.get("loc-data.php")
    	.success(function(response) {$scope.locations = response.data;});
    $scope.changeMap = function(loc){
  		console.log("clicked");
  		L.marker(loc).addTo(map);
  		map.setView(loc, 15);
  	}
});
