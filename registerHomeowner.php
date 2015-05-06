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
<<<<<<< HEAD:homeownerDisplay.php
<<<<<<< HEAD
			$phone = $_POST['phone'];
=======
>>>>>>> 1bd8214d859cf8df5e9dc5a7e881ae151ee67b1f
=======
			$phone = $_POST['phone'];
>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2:registerHomeowner.php

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

<<<<<<< HEAD:homeownerDisplay.php
<<<<<<< HEAD
			$insert = "INSERT INTO Homeowner (username, fname, lname, email, password, phone) values ('$username', '$fname', '$lname', '$email', '$password', '$phone')";
=======
			$insert = "INSERT INTO Homeowner (username, fname, lname, email, password) values ('$username', '$fname', '$lname', '$email', '$password')";
>>>>>>> 1bd8214d859cf8df5e9dc5a7e881ae151ee67b1f
=======
			$insert = "INSERT INTO Homeowner (username, fname, lname, email, password, phone) values ('$username', '$fname', '$lname', '$email', '$password', '$phone')";
>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2:registerHomeowner.php
			
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
