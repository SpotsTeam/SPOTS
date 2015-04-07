<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Spots Homeowner Page</title>

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
					
					<li> <form action="/SPOTS/loginPage.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						<i class="fa fa-1x fa-street-view"> </i>Register </button></form></li>
					
				</ul>
			</div>
		</div>
	</div>


	<!-- Main Body -->	

	<div style="margin-top:80px" class="centered">
	
	
	<?php
		if(isset($_POST['username'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zipcode = intval($_POST['zipcode']);
			$spots = intval($_POST['spots']);
			$email = $_POST['email'];
			$price = $_POST['price'];

			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				?> <h2><br><br><br>You are now a registered Homeowner!<br></h2> <?php
			} else {
				//go back to sign up page
				//echo "<h3>$email is an invalid email <br>Please enter valid email</h3>";
				header("Location: /SPOTS/HomeownerPage.php");
				exit;
			}
			
			$servername = "localhost";

			//here we're going to use the root because it would be easier
			//WILL BE CHANGED EVENUTALLY TO A USER
			$databaseUsername = "spotsuser";
			$databasePassword = "spots123";
			$database = "spots";

			// Create connection, we're assuming that there is already a database created
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

			$insert = "INSERT INTO Homeowner (username, fname, lname, email, password) values ('$username', '$fname', '$lname', '$email', '$password')";
			
			if (mysql_query($insert) == TRUE) {
				echo "Homeowner info entered successfully<br>";
			} else {
				echo "Error: ". $insert . "<br>" . mysql_error();
			}
			
			$query = mysql_query("SELECT userId FROM Homeowner where username = '$username'", $conn);
			$row = mysql_fetch_row($query);
			$homeownerId = $row[0];

			$insertHome =  "INSERT INTO Home (userId, address, city, state, zipcode) VALUES ($homeownerId, '$address', '$city', '$state', $zipcode)";

			if (mysql_query($insertHome) === TRUE) {
				echo "Home info entered successfully<br>";
			} else {
				echo "Error: " . $insertHome . "<br>" . mysql_error();
			}

			$query2 = mysql_query("SELECT homeId from Home where userId = $homeownerId", $conn);
			$row2 = mysql_fetch_row($query2);
			$home_id = $row2[0];
			//echo $row2[0];

			$insertSpots = "INSERT INTO Spots (homeId, price, taken, license) values ($home_id, $price, false, NULL)";

			for ($i = 0; $i < $spots; $i++) {
				if (mysql_query($insertSpots) == TRUE) {
					echo "*";
				} else {
					echo "Error: " . $insertSpots . "<br>" . mysql_error();
				}
			}

			
		}
	?>
	</div>
</body>

<html>
