function authenticate() {
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


function myInformation() {

    // url: "../api/Slim/signin",
    //         type: "post",
    //         async: false,
    //         dataType = "json",
    //         success:function(data) {
    //             loggedIn = data;
    //         }
}

function myProfile() {
        alert("hey you");
        $.ajax({
        url: "../api/Slim/getMyProfile",
        type: "post",
        dataType: "json",
        success: function(data) {
            if(data.success) {
                $('#cur_fName').text(data.fName);
                $('#cur_lName').text(data.lName);
                $('#cur_email').text(data.email);
            }
            else 
                window.location = "login.html";
        }
    });
}



function signin() {

    if(validLogin()) {
        var data = authenticate();
        if(data.success) {
            alert("Welcome, " + data.fName + "!");
            //window.location = "../signin/homePage.php";
            window.open("/SPOTS/signin/profile.html");// = "/SPOTS/index.html";
        }
        else
            alert(data);
    }
}

function test() {
	alert("teach me how to duggie");
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
