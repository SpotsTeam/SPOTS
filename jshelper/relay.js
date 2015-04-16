function authenticate() {
    var result = "";
    $.ajax({
        url: "api/Slim/login",
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

alert("YAY");
    if(validLogin()) {
        var data = authenticate();
        if(data.success) {
            alert("Welcome, " + data.email + "!");
            window.location = "/SPOTS/testMyApi.html";
        }
        else
            alert(data);
    }
}


function validEmail() {
    var regex = /\w+@gmail\.com/;
    var email = document.getElementById("email").value;
    
    if(regex.test(email))
        return true;
    else {
        alert("You must enter an SMU email address.");
        return false;
    }
}


function validLogin() {
    return (validEmail() && validPass());
}

function validPass() {

	return ""
//     var pass1=document.getElementById('password');
//     var pass2=document.getElementById('password2');
//     if(pass2 == null) 
//         pass2 = pass1;

//     var message=document.getElementById('validateMessage');
//     var matchColor="#66cc66";
//     var noMatch="#ff6666";
    
//     if (pass1.value == pass2.value) {
//         if(message != null) {
//             pass2.style.backgroundColor = matchColor;
//             message.style.color=matchColor;
//             message.innerHTML="Passwords match!";
//         }

//         var isValid = /[\w!@#$%&*;'"_]{8,64}/;
//         if(isValid.test(pass1.value))
//             return true;
//         else {
//             alert("Passwords must be 8-64 characters and not contain the following: ! @ # $ % & * ; ' _ ");
//             return false;
//         }
//         //document.getElementById('submit').disabled=false;
//     }
//     else if (message != null) {
//         pass2.style.backgroundColor = noMatch;
//         message.style.color=noMatch;
//         message.innerHTML = "Passwords do not match!";
//         //document.getElementById('submit').disabled=true;
//     }
//     return false;
// }

}