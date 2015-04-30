
//Angular functions (Event search/filtering)
angular.module('locations', []).controller('myCtrl', function($scope, $http){
    $http.get("loc-data.php")
      .success(function(response) {$scope.locations = response.data;});
    $scope.changeMap = function(loc){
      L.marker(loc).addTo(map);
      map.setView(loc, 15);
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
    if ($(window).scrollTop() > 0) {
      $('.scroll-up').addClass('show');
    } else {
      $('.scroll-up').removeClass('show');
    }
  });
});