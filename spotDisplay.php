<!-- So when we open the file what we want is for the information of the spot to be displayed -->
<!-- First we need to access the database in order to get the information -->
<!-- wanting to create a pop up menu just like for the about spots page -->
<html>
	<head><title>Spot Information </title></head>
	<body>
		<?php

			//How do we query the database based on information from the point we click on?
			//Erik created a javascript to convert the address to lat and long, I don't know if I need to convert back

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

			//When we display the spots we need location, number of spots available, the price, and homeowner
			//QUESTION: WHAT IS THE CONNECTION BETWEEN THE DATABASES?
			//In a sense, we want to get the spot based on the location that we click on because that is how we determine what is the 
			$databaseQuery = mysql_query("SELECT numOfSpots, priceOfSpot, street, city, state, zip, numOfSpots, priceOfSpot, fname, lname 
										  FROM Homeowner
										  WHERE Homeowner.street = street AND Homeowner.city = city AND Homeowner.zip = zip and Homeowner.state = state");

			//need to figure out how to print all this stuff properly to the screen
			if($databaseQuery == TRUE)
			{	
				//retrieving the information of the homeowner
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