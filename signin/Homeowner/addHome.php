<?php 
	echo "Hello";
	include("../login.php");
	if(isset($_SESSION['username'])) {
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = intval($_POST['zipcode']);
		$spots = intval($_POST['spots']);
		$price = $_POST['price'];
		$username = $_SESSION['username'];

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
		$success = true;

		$userIdQuery = "SELECT userId from Homeowner where username = '$username'";
		$userIdResult = mysql_query($userIdQuery, $conn);
		$userIdQuery = mysql_fetch_row($userIdResult);
		$userId = $userIdQuery[0];
		$addHome = mysql_query("INSERT INTO Home (userId, address, city, state, zipcode, eventId) values ($userId, '$address', '$city', '$state', $zipcode, NULL)", $conn);

		if ($addHome) {
			echo "successfully added Home to database";
		} else {
			echo "failed";
			$success = false;
		}

		$homeIdR = "SELECT homeId from Home where address = '$address'";
		$homeIdQuery = mysql_query($homeIdR, $conn);
		$homeIdRow = mysql_fetch_row($homeIdQuery);
		$homeId = $homeIdRow[0];
		
		if ($success) {
			for ($i = 0; $i < $spots; $i += 1) {
				
				$insertSpotsQuery = mysql_query("INSERT INTO Spots (homeId, price, taken, license) values ($homeId, $price, false, NULL)", $conn);
				if ($insertSpotsQuery) {
					echo "*";
				} else {
					echo "issue inserting spots";
				}
			}

			if ($success) {
				header("Location: successHomeAdd.html");
			} else {
				header("Location: addhome.html");
			}
		}

		mysql_close();

		
	}




?>