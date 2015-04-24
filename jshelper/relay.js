function authenticate() {
    alert("Driver");
    var result = "";
    $.ajax({
        url: "../api/Slim/signinDriver",
        type: "post",
        async: false,
        data: {
            "email":$("#email").val(), 
            "password":$("#password").val()
        },
        dataType: "json",
        success:function(data) {
            result = data;
        }
    });

    return result;
}

function authenticateHomeowner() {
    alert("Homeowner");
    var result = "";
    $.ajax({
        url: "../api/Slim/signinHomeowner",
        type: "post",
        async: false,
        data: {
            "email":$("#email").val(), 
            "password":$("#password").val()
        },
        dataType: "json",
        success:function(data) {
            result = data;
        }
    });

    return result;
}

function driverOrHomeowner() {
    if(document.getElementById("Driver").value)
        signin();
    else
        signinHomeowner()
}

function myProfile() {
        $.ajax({
        url: "../api/Slim/getMyProfile",
        type: "post",
        async: false,
        data: {
            "email":$("#email").val()
        },
        dataType: "json",
        success: function(data) {
            if(data.success) {
                //alert("Hello Mr. " + data.fName + " :)" );
                var temp = data.fName;
                alert(temp);
                //var myFirstName = "<h4>First name:  <label id = '#fName'>" + data.fName + "</label> </h4>"; 
                //alert(myFirstName);
                //$('#fName').append(temp);

                //alert($('#firsName').text(data.fName));
                //$('#firstName').append(temp);
                //$('#firstName').text(data.fName);
                //$('#lastName').val() = data.lName;
                document.getElementById('firstName').innerHTML(data.fName);

                window.open("/SPOTS/signin/profile.html");
                //window.open("/SPOTS/signin/homePage.php");
                 // $('#lastName').text(data.lName);
                 // $('#email').text(data.email);
            }
            else {
                window.location = "/SPOTS/signin/signin.php";
            }
        }
    });
}


function registerDriver() {
    alert("AYOOOO");
    $.ajax({ 
        url: "api/Slim/registerDriver",
        type: "post",
        async: false,
        data: {
            "userId":$("#userId").val(),
            "username":$("#username").val(),
            "fName":$("#fName").val(),
            "lName":$("#lName").val(),
            "email":$("#email").val(),
            "password":$("#password").val(),
            "street":$("#street").val(),
            "city":$("#city").val(),
            "state":$("#state").val(),
            "zip":$("#zip").val(),
            "phone":$("#phone").val(),
        },
        dataType: "json",
        success: function(data) {
            if(data.success){
                alert("SUCCESS");
                window.open("/SPOTS/signin/profile.html");
            }
            else
                alert("ERROR");
        }
    })
}

function registerEvent() {
    alert("register event");
    $.ajax({ 
        url: "../api/Slim/registerDriver",
        type: "post",
        data: {
            "eventId":$("#eventId").val(),
            "eventname":$("#eventrname").val(),
            "startDate":$("#startDate").val(),
            "startTime":$("#startTime").val(),
            "endDate":$("#endDate").val(),
            "endTime":$("#endTime").val(),
            "category":$("#category").val(),
            "address":$("#address").val(),
            "city":$("#city").val(),
            "state":$("#state").val(),
            "zip":$("#zip").val(),      
        },
        dataType: "json",
        success: function(data) {
            if(data.success){
                alert("SUCCESS");
            }
            else
                alert("ERROR");
        }
    })
}

function registerHomeowner() {
    alert("Register Homeowner");
    $.ajax({ 
        url: "../api/Slim/registerHomeowner",
        type: "post",
        data: {
            "userId":$("#userId").val(),
            "username":$("#username").val(),
            "fName":$("#fName").val(),
            "lName":$("#lName").val(),
            "email":$("#email").val(),
            "password":$("#password").val(),
            "phone":$("#phome").val(),
        },
        dataType: "json",
        success: function(data) {
            if(data.success){
                alert("SUCCESS");
            }
            else
                alert("ERROR");
        }
    })
}


function signin() {

    if(validLogin()) {
        var data = authenticate();
        if(data.success) {
            alert("Welcome, " + data.fName + "!");
            myProfile();
            //window.location = "../signin/homePage.php";
            //window.open("/SPOTS/signin/homePage.php");// = "/SPOTS/index.html";
        }
        else
            alert(data);
    }
}

function signinHomeowner() {
    if(validLogin()) {
        var data = authenticateHomeowner();
        if(data.success) {
            alert("Welcome, " + data.fName + "!");
            //window.location = "../signin/homePage.php";
            window.open("/SPOTS/signin/profile.html");// = "/SPOTS/index.html";
        }
        else
            alert(data);
    }
}

function signOut() {

    $.ajax({
    url: "api/Slim/signOut",
    type: "post",
    dataType: "json",
    success:function() {
        window.location = "index.html";
    }
    });
}

function validateEmail() {
    var tempEmail = document.getElementById('email').value;
    alert(tempEmail);
    return true;
}


function validLogin() {
    return (validateEmail() && validatePassword());
}

function validatePassword() {

	var tempPassword = document.getElementById('password').value;
	alert(tempPassword);
	return true;
}
