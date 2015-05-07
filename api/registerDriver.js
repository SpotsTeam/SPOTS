
// function register_driver() {
//  	var username = $("input#usernameD").val();
//  	alert("username: " +username);
// }




  $("#register_driver").click(function() {
  	if (confirm("Register as a Driver?")) {
	var username = $("input#usernameD").val();
	var password = $("input#passwordD").val();
	var fname = $("input#fnameD").val();
	var lname = $("input#lnameD").val();
	var email = $("input#emailD").val();
	var address = $("input#addressD").val();
	var city = $("input#cityD").val();
	var state = $("#stateD").val();
	var zipcode = $("input#zipcodeD").val();
	var make = $("input#makeD").val();
	var model = $("input#modelD").val();
	var license = $("input#licenseD").val();
	var phone = $("input#phoneD").val();


	alert("Registering as Driver with Username: " + username);
	if (username == "") {
	   $('.errormess').html('Please Insert Your Username');	
       return false;
    } 
	if (password == "") {
	   $('.errormess').html('Please Insert Your Password');	
       return false;
    }
    if (email == "") {
	   $('.errormess').html('Please Insert Your Email');	
       return false;
    }
    //if ()
    // var select = $("#select").val();
	var dataString = 'username='+ username + '&password=' + password + '&fname=' + fname + '&lname=' + lname + '&email=' + email + '&address=' + address + '&city=' + city + '&state=' + state + '&zipcode=' + zipcode + '&make=' + make +'&model=' + model + '&license=' + license + '&phone=' + phone;
	$.ajax({
      type: "POST",
      url: '/SPOTS/registerDriver.php',
      data: dataString,
	  dataType: "html",
      success: function(data) {
	  if (data == 0) {
	  $('.errormess').html('Wrong Login Data');
		} else {
			$('.errormess').html('');
			alert("Congratulations! <br>You have registered as a driver!<br>Username: " + username);	
			//document.location.href = '/SPOTS/signin/homePage.php';	
		}
      }
     });
	}
    return false;
	});


