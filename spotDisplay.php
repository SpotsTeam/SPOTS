<!-- So when we open the file what we want is for the information of the spot to be displayed -->
<!-- First we need to access the database in order to get the information -->

<html>
	<head><title>Spot Information </title></head>
	<body>
		<?php
			$servername = "localhost";

			//here we're going to use the root because it would be easier
			//WILL BE CHANGED EVENUTALLY TO A USER
			$username = "spotsuser";
			$password = "spots123";
			$database = "spots";

			// Create connection, we're assuming that there is already a database created
			global $conn;
			$conn = mysql_connect($servername, $username, $password);

			// Check connection
			if (!$conn) 
			{
				//if the connection fails then we kill the whole thing
    			die("Connection failed: " . mysql_error());
			}

			//select the database that we need to pull from
			mysql_select_db($database);

			//When we display the spots we need location, number of spots available, the price, start date, start time, end date, end time
			//QUESTION: HOW DO WE QUERY THE DATABASE?
			$databaseQuery = mysql_query("SELECT numOfSpots, priceOfSpot, startDate, startTime, endDate, endTime, street, city, state, zip, numOfSpots, priceOfSpot, fname, lname 
										  FROM Homeowner");

			//need to figure out how to print all this stuff properly to the screen
			if($databaseQuery == TRUE)
			{
				//retrieve the dates
				$dates = $row['startDate'] . " to " . $row['endDate'] . " at " . $row['startTime'] . " till " . $row['endTime'];
				$spotOwner = $row['fname'] . " " . $row['lname'];
				$address = $['street'] . " " . $row['city'] . ", " . $row['state'] . " " . $row['zip']
				$numSpotsAndPrice = $['numOfSpots']



				echo $var;
			}
			else
			{
				die("homeowner table not available " . mysql_error());
					
			}

	</body>