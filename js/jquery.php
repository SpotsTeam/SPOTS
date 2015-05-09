
//Angular functions (Event search/filtering)
angular.module('locations', []).controller('myCtrl', function($scope, $http){
  	// $http.get("loc-data.php")
   //  	.success(function(response) {$scope.locations = response.data;});
    // $.getJson('getEvents.php',function(jsonData){
    //   $scope.locations == jsonData; 
    // });       
   
    var data = <?php include("../getEvents.php"); json_encode($data); ?>;
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


$(function() {
    $('a').on('click', function() {
        var $anchor = $(this);
        var myOffset = 90;
        if ($($anchor.attr('href')).is("#about")){
          myOffset=150;
        }
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - myOffset
        }, 1200, 'easeInOutExpo');
    });
});

//Button transition to next section
$('.scroll-down').click(function() {
    var target;
    console.log("Clicked");
    $("section").each(function(i, element) {
      target = $(element).offset().top;
      if (target - 70 > $(document).scrollTop()) {
        return false; // break
      }
    });
    $("html, body").animate({
      scrollTop: target - 45
  }, 900, 'easeInOutExpo');
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
