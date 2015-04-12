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

    if(validLogin()) {
        var data = authenticate();
        if(data.success) {
            alert("Welcome, " + data.email + "!");
            window.location = "signIn.php";
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

// function validFName() {
//     var regex = /[A-Z][a-z]+/;
//     var name = document.getElementById("f_name").value;
//     if(regex.test(name))
//         return true;
//     else {
//         alert("Your first name must start with uppercase letter");
//         return false;
//     }
// }

// function validLName() { 
//     var regex = /[A-Z][a-zA-Z]+/;
//     var name = document.getElementById("l_name").value;
//     if(regex.test(name))
//         return true;
//     else {
//         alert("Your last name start with an uppercase letter");
//         return false;
//     }
// }

function validLogin() {
    return (validEmail() && validPass());
}

function validPass() {
    var pass1=document.getElementById('password');
    var pass2=document.getElementById('password2');
    if(pass2 == null) 
        pass2 = pass1;

    var message=document.getElementById('validateMessage');
    var matchColor="#66cc66";
    var noMatch="#ff6666";
    
    if (pass1.value == pass2.value) {
        if(message != null) {
            pass2.style.backgroundColor = matchColor;
            message.style.color=matchColor;
            message.innerHTML="Passwords match!";
        }

        var isValid = /[\w!@#$%&*;'"_]{8,64}/;
        if(isValid.test(pass1.value))
            return true;
        else {
            alert("Passwords must be 8-64 characters and not contain the following: ! @ # $ % & * ; ' _ ");
            return false;
        }
        //document.getElementById('submit').disabled=false;
    }
    else if (message != null) {
        pass2.style.backgroundColor = noMatch;
        message.style.color=noMatch;
        message.innerHTML = "Passwords do not match!";
        //document.getElementById('submit').disabled=true;
    }
    return false;
}

function validRegister() {
    if(!validEmail())
        return false;
    else if(!validPass())
        return false;
    // else if(!validFName())
    //     return false;
    // else if(!validLName())
    //     return false;
    else 
        return true;
}