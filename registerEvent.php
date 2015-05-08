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

<<<<<<< HEAD
                </button>
                <a href="/SPOTS/signin/homePage.php">
                    <img alt="" src="img/spotslogo2.png" class="img-brand"></img>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="navbar-left">
                
                </div>
                <!-- <ul class="nav navbar-nav navbar-right">
                   
                    <li> <form action="loginPage.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
                        <i class="fa fa-1x fa-street-view"> </i>Register </button></form></li>
<<<<<<< HEAD
                    <li> <form action="aboutMe.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
                        <i class="fa fa-1x fa-car"> </i>About SPOTS </button></form></li>

                </ul>
=======
                </ul> -->
>>>>>>> 0ab808cd27883cdca6494b24065d1e311fce223d
            </div>
        </div>
    </div>
=======
>>>>>>> a76aa055580d6c8469897ae901cda7639fccd065

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
