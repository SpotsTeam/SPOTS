function authenticate() {
//    alert("Driver");
    var result = "";
    $.ajax({
        url: "../api/Slim/signinDriver",
        type: "post",
        async: false,
        data: {
            "username":$("#username").val(),
            "password":$("#password").val(),
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
            "username":$("#username").val(), 
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
                // var temp = data.fName;
                // alert(temp);
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
    alert("Register?");
    $.ajax({ 
        url: "/SPOTS/api/Slim/registerDriver",
        type: "post",
        async: false,
        data: {
            "username":$("#username").val(),
            "fName":$("#fName").val(),
            "lName":$("#lName").val(),
            "email":$("#email").val(),
            "password":$("#password").val(),
            "street":$("#address").val(),
            "city":$("#city").val(),
            "state":$("#state").val(),
            "zip":$("#zipcode").val(),
            "phone":$("#phone").val(),
            "carMake":$("#carMake").val(),
            "carModel":$("#carModel").val(),
            "licensePlate":$("#licensePlate").val(),
        },
        dataType: "json",
        success: function(data) {
            if(data.success){
                alert(data.fname);
                //window.open("/SPOTS/signin/profile.html");
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
            "phone":$("#phone").val(),
            "address":$("#address").val(),
            "city":$("#city").val(),
            "state":$("#state").val(),
            "zip":$("#zipcode").val(), 
            "price":$("#price").val(),
            "spots":$("#spots").val(),
        },
        dataType: "json",
        success: function(data) {
            if(data.success){
                window.open("/SPOTS/signin/profile.html");
                alert("SUCCESS");
            }
            else
                alert("ERROR");
        }
    })
}


function signin() {
    if(validLogin()) {
        var data2 = authenticate();
        alert(data2.email);
        //if(data.success) {
            $.ajax({
            type: "post",
            url: "/SPOTS/signin/homePage.php",
            // data: {
            //     // "username":data2.username,
            //     // "password":data2.password,
            //     data:data2,
            //     // "username":$("#username").val(),
            //     // "password":$("#password").val(),
            // },
            async: false,
            dataType: "html",
            success: function(data)
            {
                if(data.success)
                {
                    alert(data2.lName);
                }
                else
                {
                    alert("ERROR");
                    alert(data2.lName);
                    window.open("/SPOTS/signin/homePage.php")
                }
            }
            //passToLogin(data);
            //alert("Welcome, " + data.fName + "!");
            //myProfile();
            //window.location = "../signin/homePage.php";
            //window.open("/SPOTS/signin/homePage.php");// = "/SPOTS/index.html";
            //window.open("/SPOTS/signin/login.php");
            });
            //}
            // else
            // {
            //     alert("err");
            // }

}
}

// function passToLogin(d) {
//     $.ajax({
//     url: "/SPOTS/signin/login.php",
//     type: "post",
//     //async: false,
//     // data: {
//     //     "username":$("#username").val(), 
//     //     "password":$("#password").val(),
//     // },
//     dataType: "html",
//     success: function(data)
//     {
//         if (data.success)
//         {
//             alert(data.lName);
//         document.location.href = '/SPOTS/signin/homePage.php';
//         }
//         else 
//             alert(data.lName);
//             alert("HDFHS");
//     }

// });
// }


(function() {
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
});




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

function validateUsername() {
    var tempUsername = document.getElementById('username').value;
    alert(tempUsername);
    return true;
}


function validLogin() {
    return (validateUsername() && validatePassword());
}

function validatePassword() {

    var tempPassword = document.getElementById('password').value;
    alert(tempPassword);
    return true;
}


