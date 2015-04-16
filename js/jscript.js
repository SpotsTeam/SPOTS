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

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 100
        }, 1000);
        return false;
      }
    }
  });
});