function authenticate() {
    var result = "";
    $.ajax({
        url: "../api/Slim/signin",
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



function signin() {

    if(validLogin()) {
        var data = authenticate();
        if(data.success) {
            alert("Welcome, " + data.fName + "!");
            window.location = "/SPOTS/testMyApi.html";
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
