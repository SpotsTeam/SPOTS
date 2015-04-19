
//Angular functions
angular.module('locations', []).controller('myCtrl', function($scope, $http){
  	$http.get("loc-data.php")
    	.success(function(response) {$scope.locations = response.data;});
    $scope.changeMap = function(loc){
  		L.marker(loc).addTo(map);
  		map.setView(loc, 15);
  	}
});


//Smooth scrolling function
$(function() {
    $('a').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 90
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});



//Pop up the scroll bar button
$(function(){
 
  $(document).on('scroll', function(){
 
    if ($(window).scrollTop() > 600) {
      $('.scroll-down').addClass('show');
    } else {
      $('.scroll-down').removeClass('show');
    }
  });
});