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

  function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
  }
  function validateAddress(address) {
  	var re = /^(?=.*\d)[a-zA-Z\s\d\/]+$/;
  	return re.test(address);
  }

  $("#register_driver").click(function() {
  	
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

	if (username == "") {
	   $('.errormess').html('Please Insert Your Username');	
       return false;
    } 
	if (password == "") {
	   $('.errormess').html('Please Insert Your Password');	
       return false;
    }
    if (email == "me@example.com") {
	   $('.errormess').html('Please Insert Your Email');	
       return false;
    } else if(!validateEmail(email)) {
    	$('.errormess').html('Please Enter a valid email address');
    	return false;
    }
    if (license == "") {
    	$('.errormess').html('Please enter your license plate number');
    	return false;
    }
    if (fname == "") {
    	fname = null;
    }
    if (lname == "") {
    	lname = null;
    }
    if (address =="") {
    	address = "No Address on Record";
    } else if (!validateAddress(address)) {
    	$('.errormess').html('Please enter valid Address');
    	return false;
    }
    if (phone == "") {
    	phone = null;
    } 
    if (confirm("Register as a Driver?")) {
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
			document.location.href = '/SPOTS/index.html';	
		}
      }
     });
	}
    return false;
	});

	$("#register_homeowner").click(function() {
  	
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
    } else if (!validateEmail(email)) {
    	$('.errormess').html('Please enter a valid Email');
    	return false;
    }
    if (address =="") {
    	$('.errormess').html('Please enter an Address');
    	return false;
    } else if (!validateAddress(address)) {
    	$('.errormess').html('Please enter valid Address');
    	return false;
    }
    if (city =="") {
    	$('.errormess').html('Please enter a City');
    	return false;
    }
    if (spots == "") {
    	$('.errormess').html('Please enter number of parking spots you have available');
    	return false;
    }
    if (price =="") {
    	$('.errormess').html('Please enter a price per spot. If Free type "0"');
    	return false;
    } 
    if (confirm("Register as a Homeowner?")) {


	// alert("Registering as Homeowner with Username: " + username);    
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
			document.location.href = '/SPOTS/index.html';	
		}
      }
     });
	}
    return false;
	});

	$("#register_event").click(function() {
  	
	var eventName = $("#eventName").val();
	var startMonth = $("#startMonth").val();
	var startDay = $("#startDay").val();
	var startYear = $("#startYear").val();
	var endMonth = $("#endMonth").val();
	var endDay = $("#endDay").val();
	var endYear = $("#endYear").val();
	var category = $("#category").val();
	var address = $("#address").val();
	var city = $("#city").val();
	var zipcode = $("#zipcode").val();
	var state = $("#state").val();


	if (confirm("Register this event?")) {
    //if ()
    // var select = $("#select").val();
	var dataString = 'eventName='+ eventName + '&startMonth=' + startMonth + '&startDay=' + startDay + '&startYear=' + startYear + '&endMonth=' + endMonth + '&endDay=' + endDay + '&endYear=' + endYear + '&state=' + state + '&zipcode=' + zipcode + '&address=' + address +'&city=' + city + '&category=' + category;
	$.ajax({
      type: "POST",
      url: '/SPOTS/registerEvent.php',
      data: dataString,
	  dataType: "html",
      success: function(data) {
	  if (data == 0) {
	  $('.errormess').html('Wrong Login Data');
		} else {
			$('.errormess').html('');
			alert("Congratulations! \nYou have registered an Event!\nEvent: " + eventName);	
			document.location.href = '/SPOTS/registerEvent.html';	
		}
      }
     });
	}
    return false;
	});
});

