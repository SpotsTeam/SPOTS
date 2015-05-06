
$(function() {
  $("#submit_login").click(function() {
	var username = $("input#username").val();
	alert("Signing in as: " + username);
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
			alert("Congratulations! \nYou have registered as a driver!\nUsername: " + username);	
			//document.location.href = '/SPOTS/signin/homePage.php';	
		}
      }
     });
	}
    return false;
	});

	$("#register_homeowner").click(function() {
  	if (confirm("Register as a Homeowner?")) {
	var username = $("input#usernameH").val();
	var password = $("input#passwordH").val();
	var fname = $("input#fnameH").val();
	var lname = $("input#lnameH").val();
	var email = $("input#emailH").val();
	var address = $("input#addressH").val();
	var city = $("input#cityH").val();
	var state = $("#stateH").val();
	var zipcode = $("input#zipcodeH").val();
	var spots = $("input#spotsH").val();
	var price = $("input#priceH").val();
	var phone = $("input#phoneH").val();


	alert("Registering as Homeowner with Username: " + username);
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
	var dataString = 'username='+ username + '&password=' + password + '&fname=' + fname + '&lname=' + lname + '&email=' + email + '&address=' + address + '&city=' + city + '&state=' + state + '&zipcode=' + zipcode + '&spots=' + spots +'&price=' + price + '&phone=' + phone;
	$.ajax({
      type: "POST",
      url: '/SPOTS/registerHomeowner.php',
      data: dataString,
	  dataType: "html",
      success: function(data) {
	  if (data == 0) {
	  $('.errormess').html('Wrong Login Data');
		} else {
			$('.errormess').html('');
			alert("Congratulations! \nYou have registered as a Homeowner!\nUsername: " + username);	
			//document.location.href = '/SPOTS/signin/homePage.php';	
		}
      }
     });
	}
    return false;
	});

});

