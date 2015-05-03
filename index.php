<?php
require '../composer/vendor/autoload.php';
session_cache_limiter(false);
session_name("SPOTS");
session_start();
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();
$database = new mysqli("localhost","spotsuser","spots123","spots");
/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */
// GET route
$app->post('/getMyProfile',function () use($database){
    // $userId = "";
    // if(isset($_SESSION["uid"]))
    //     $userId = $_SESSION["uid"];
    // else {
    //     echo json_encode(array("success"=>false, "error"=>"Not logged in"));
    //     return;
    // }
    $username = $_POST['username'];
    $_SESSION["username"] = $username;
    $runQuery = $database->query("SELECT * FROM Driver WHERE username = '$username' LIMIT 1");
    $result = $runQuery->fetch_assoc();
    $action = array();
    if($result === NULL)
        $action = array("success"=>false, "userId"=>0,"fName"=>"Not Valid","lName"=>"Not Valid", "error"=>"User ID not valid.");
    else
        $action = array("success"=>true, "fName"=>$result['fName'],"lName"=>$result['lName'], "us"=>$result['email'], "username"=>$result['username'], "street"=>$result['street'], "city"=>$result['city'], "state"=>$result['state'], "zip"=>$result['zip'], "phone"=>$result['phone'],"error"=>"None");
    echo json_encode($action);
});
$app->post('/registerDriver',function () use ($database) {
    $username = $_POST['username'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $carMake = $_POST['carMake'];
    $carModel = $_POST['carModel'];
    $licensePlate = $_POST['licensePlate'];
    $userId = 0;
    $runQuery = $database->query("SELECT userId FROM Driver ORDER BY userId DESC LIMIT 1;");
    $userIdRow = $runQuery->fetch_assoc();
    $userId = $userIdRow['userId'] + 1;
    //look at how to update a query
    $database->query("INSERT INTO Driver (userId, username, fName, lName, email, password, street, city, state, zip, phone) VALUES($userId, '$username', '$fName','$lName', '$email', '$password','$street', '$city', '$state', $zip, $phone);");
    //$runQuery = $database->query("SELECT max(userId) FROM Driver;");
    //$userIdRow = $runQuery->fetch_assoc();
    //$userId = $userIdRow['userId'];
    $database->query("INSERT INTO Vehicle (licensePlate, carMake, carModel, userId) VALUES ('$licensePlate','$carMake','$carModel', $userId);");
    //$result = $runQuery->fetch_assoc();
    $action = array("success"=>true, "fName"=>$result['fName'],"lName"=>$result['lName'], "us"=>$result['email'], "username"=>$result['username'], "street"=>$result['street'], "city"=>$result['city'], "state"=>$result['state'], "zip"=>$result['zip'], "phone"=>$result['phone'],"error"=>"None");
    echo json_encode($action);
});
$app->post('/registerEvent',function () use ($database) {
    $firstName = $_POST['fName'];
    //look at how to update a query
    $updateQuery = $database->query("INSERT INTO Driver VALUES('$eventId', '$eventname' '$startDate','$startTime', '$endDate', '$endTime','$category','$address', '$city', '$state', '$zip')");
});
$app->post('/registerHomeowner',function () use ($database) {
    $username = $_POST['username'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $spots = $_POST['spots'];
    $price = $_POST['price'];
    $userId = 0;
    $runQuery = $database->query("SELECT userId FROM Homeowner ORDER BY userId DESC LIMIT 1;");
    $userIdRow = $runQuery->fetch_assoc();
    $userId = $userIdRow['userId'] + 1;
    $database->query("INSERT INTO Homeowner (userId, username, fName, lName, email, password, phone) VALUES('$userId', '$username', '$fName','$lName', '$email', '$password','$phone');");
    $database->query("INSERT INTO Home (homeId, userId, address, city, state, zip, eventId ) VALUES ('$homeId', '$userId', '$address','$city','$state', '$zip', '$eventId');");
    $action = array("success"=>TRUE, "fName"=>$fName, "username"=>$username, "errorType"=>"none");
    echo json_encode($action);
});
// $app->post('/registerVehicle',function () use ($database) {
//     $carMake = $_POST['carMake'];
//     $carModel = $_POST['carModel'];
//     $licensePlate = $_POST['licensePlate'];
//     //look at how to update a query
//     $database->query("INSERT INTO Vehicle (licensePlate, carMake, carModel) VALUES ('$licensePlate','$carMake','$carModel');");
// });
$app->post('/signinDriver',function () use ($database) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $runQuery = $database->query("SELECT * FROM Driver WHERE username = '$username' AND password = '$password' LIMIT 1;");
     $result = $runQuery->fetch_assoc();
     $action = array();
    if ($result === NULL)
        $action = array("success"=>FALSE, "fName"=>"Not Valid","lName"=>"Not Valid","userId"=>-1);
        else
        {
            $action = array("success"=>TRUE, "fName"=>$result['fName'],"lName"=>$result['lName'], "email"=>$result['email'], "username"=>$result['username'], "password"=>$result['password'], "street"=>$result['street'], "city"=>$result['city'], "state"=>$result['state'], "zip"=>$result['zip'], "phone"=>$result['phone']);
            //$_SESSION["userId"] = $action["userId"];
        }
    echo json_encode($action);
});
$app->post('/signinHomeowner',function () use ($database) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $runQuery = $database->query("SELECT fName,lName,userId FROM Homeowner WHERE username = '$username' AND password = '$password' LIMIT 1;");
     $result = $runQuery->fetch_assoc();
     $action = array();
    if ($result === NULL)
        $action = array("success"=>FALSE, "fName"=>"Not Valid","lName"=>"Not Valid","userId"=>-1);
        else
        {
            $action = array("success"=>true, "fName"=>$result['fName'], "lName"=>$result['lName'],"userId"=>$result['userId']);
            $_SESSION["userId"] = $action["userId"];
        }
    echo json_encode($action);
});
$app->post('/signOut',function() use ($database) {
    $_SESSION = array();
    session_destroy();
});
// }
// $app->post('/userHomePage',function() use ($database) {
//     myName = $_POST['name'];
// }
/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();