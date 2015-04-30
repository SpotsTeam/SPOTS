<?php 
	if(isset($_POST['homeownerSubmit'])) {
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
		$phone = $_POST['phone'];

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

		$insert = "INSERT INTO Homeowner (username, fname, lname, email, password, phone) values ('$username', '$fname', '$lname', '$email', '$password', '$phone')";
		
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

		 
	} else if (isset($_POST['driverSubmit'])) {
		if(isset($_POST['username'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zipcode = $_POST['zipcode'];
			$carMake = $_POST['make'];
			$carModel = $_POST['model'];
			$licensePlate = $_POST['license'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];

			$servername = "localhost";

			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				?> <h2><br><br><br>You are now a registered Driver!<br></h2> <?php
			} else {
				//go back to sign up page
				echo "<h3>$email is an invalid email <br>Please enter valid email</h3>";
				//header("Location: /SPOTS/drivePage.php");
				//exit;
			}

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

			$insert = "INSERT INTO Driver (username, fname, lname, email, password, street, city, state, zip, phone) VALUES ('$username', '$fname', '$lname', '$email', '$password', '$address', '$city', '$state', $zipcode, '$phone')";

			if (mysql_query($insert) === TRUE) {	
				echo "Driver info entered successfully<br>";
			} else {
				echo "Error: " . $insert . "<br>" . mysql_error();
			}

			$query = mysql_query("SELECT userId FROM Driver where username = '$username'", $conn);
			$row = mysql_fetch_row($query);
			
			$userId = $row[0];
			$insert2 =  "INSERT INTO Vehicle (licensePlate, carMake, carModel, userId) values ('$licensePlate', '$carMake', '$carModel', $userId)";

			if (mysql_query($insert2) === TRUE) {	
				echo "Car added to $username<br>";
			} else {
				echo "Error: " . $insert2 . "<br>" . mysql_error();
			}
		}
	}


?>