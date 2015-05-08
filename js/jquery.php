
//Angular functions (Event search/filtering)
angular.module('locations', []).controller('myCtrl', function($scope, $http){
  	// $http.get("loc-data.php")
   //  	.success(function(response) {$scope.locations = response.data;});
    // $.getJson('getEvents.php',function(jsonData){
    //   $scope.locations == jsonData; 
    // });       
   
    var data = <?php include("../getEvents.php"); json_encode($events); ?>;
     $scope.locations = data;

    var RedIcon = L.Icon.Default.extend({
        options: {
              iconUrl: '/SPOTS/js/images/marker-icon-red.png' 
        }
     });
    var redIcon = new RedIcon();

    $scope.changeMap = function(loc, title){
  		var marker = new L.marker(loc, {icon:redIcon});
      map.addLayer(marker);
      marker.bindPopup("<b> Here!! </b>").openPopup();
  		map.setView(loc, 15);
      setInterval(function(){map.removeLayer(marker)},1500);
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
 
    if ($(window).scrollTop() > 500) {
      $('.scroll-down').addClass('show');
      $('.scroll-up').addClass('show');
    } else {
      $('.scroll-down').removeClass('show');
      $('.scroll-up').removeClass('show');
    }
  });
});
