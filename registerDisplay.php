<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Spots Register Page</title>

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    <!-- TipueDrop CSS -->
    <link href="css/tipuedrop.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="css/leaflet.css"
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
	<!-- Fixed Top Navbar -->
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a href="index.html">
					<img alt="" src="img/spotslogo2.png" class="img-brand"></img>
				</a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="navbar-left">
				
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li> <button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none"> 
						<i class="fa fa-1x fa-car"></i> My Spots </button></li>
					<li> <form action="loginPage.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						<i class="fa fa-1x fa-street-view"> </i>Register </button></form></li>
					<li> <form action="aboutMe.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						<i class="fa fa-1x fa-car"> </i>About SPOTS </button></form></li>
				</ul>
			</div>
		</div>
	</div>


	<!-- Main Body -->	

	<div style="margin-top:80px" class="centered">
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
				header("Location: /SPOTS/registerEvent.php");
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
				//echo "database successfully connected<br>";
			}

			mysql_select_db($database);

			$insert = "INSERT INTO Events (eventname, startDate, endDate, category, address, city, state, zipcode) VALUES ('$eventName', '$startYear-$startMonth-$startDay', '$endYear-$endMonth-$endDay', '$category', '$address', '$city', '$state', $zipcode)";

			if (mysql_query($insert) === TRUE) {
				echo "Event entered into database successfully<br>";
				header("Location: /SPOTS/geo.html?Address=$address&City=$city&State=$state");
				exit;
			} else {
				echo "Error: " . $insert . "<br>" . mysql_error();
			}



			//print up the information of the driver
			//echo "<h2>$eventName has been created</h2>";
		}
	?>
</div>
</body>
</html>