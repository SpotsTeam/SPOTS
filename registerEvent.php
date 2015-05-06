<?php
    if(isset($_POST['eventName'])) {
        session_start();
        $eventName = $_POST['eventName'];
        $startMonth = $_POST['startMonth'];
        $startDay = $_POST['startDay'];
        $startYear = $_POST['startYear'];
        $endMonth = $_POST['endMonth'];
        $endDay = $_POST['endDay'];
        $endYear = $_POST['endYear'];
        $category = $_POST['category'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $completeAddress = $address .', ' . $city .', ' . $state; 

        $_SESSION['address'] = $address;
        $_SESSION['city'] = $city;
        $_SESSION['state'] = $state;
        $_SESSION['zipcode'] = $zipcode;

        if ($address != '' && $city != '' && $zipcode != NULL) {
            ?> <h2><br><br><br>New Event Added!<br></h2><?php
        } else {
            header("Location: /SPOTS/registerEvent.html");
            exit;
        }


        $servername = "localhost";


        //here we're going to use the root because it would be easier
        //WILL BE CHANGED EVENUTALLY TO A USER
        $databaseUsername = "spotsuser";
        $databasePassword = "spots123";
        $database = "spots";

        global $conn;
        $conn = mysql_connect($servername, $databaseUsername, $databasePassword);

        // Check connection
        if (!$conn) 
        {
            //if the connection fails then we kill the whole thing
            die("Connection failed: " . mysql_error());
        } else {
            echo "database successfully connected<br>";
        }

        mysql_select_db($database);

        $insert = "INSERT INTO Events (eventname, startDate, endDate, category, address, city, state, zipcode) VALUES ('$eventName', '$startYear-$startMonth-$startDay', '$endYear-$endMonth-$endDay', '$category', '$address', '$city', '$state', $zipcode)";

        if (mysql_query($insert) === TRUE) {
            echo "Event entered into database successfully<br>";
            // header("Location: /SPOTS/geo.html?Address=$address&City=$city&State=$state");
            // et;
        } else {
            echo "Error: " . $insert . "<br>" . mysql_error();
        }



        //print up the information of the driver
        //echo "<h2>$eventName has been created</h2>";
    }
?>