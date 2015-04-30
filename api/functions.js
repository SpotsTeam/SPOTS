function register_driver() {
	return confirm("Register as Driver?");
}


$(function() {
  $("#submit_login").click(function() {
	var username = $("input#username").val();
	alert(username);
	if (username == "") {
	   $('.errormess').html('Please Insert Your Username');	
       return false;
    } 
	var password = $("input#password").val();
	if (password == "") {
	   $('.errormess').html('Please Insert Your Password');	
       return false;
    }
    var select = $("#select").val();
	var dataString = 'username='+ username + '&password=' + password + '&select=' + select;
	$.ajax({
      type: "POST",
      url: '/SPOTS/signin/login.php',
      data: dataString,
	  dataType: "html",
      success: function(data) {
	  if (data == 0) {
	  $('.errormess').html('Wrong Login Data');
		} else {
			$('.errormess').html('you are logged. wait for redirection');	
			document.location.href = '/SPOTS/signin/homePage.php';	
		}
      }
     });
    return false;
	});
});

