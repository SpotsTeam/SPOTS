<!-- So when we open the file what we want is for the information of the spot to be displayed -->
<!-- First we need to access the database in order to get the information -->
<!-- wanting to create a pop up menu just like for the about spots page -->
<html>
	<head><title>Spot Information </title></head>
	<body>
		<?php

			//We should have this as a second page in order to display information on the spot that we are looking at
			$street = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];


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

			//query the whole table and we can display based on certain information
			$databaseQuery = mysql_query("select * from Homeowner");

			//need to figure out how to print all this stuff properly to the screen
			if($databaseQuery == TRUE)
			{	
				//retrieving the information of the homeowner based on whether or not the clicked on information matches up
				//We're only looking for one thing
				if($street = $row['street'] && $city = $row['city'] && $state = $row['state'] && $zip = $row['zip'])
				{	

					$spotOwner = $row['fname'] . " " . $row['lname'];
					$address = $['street'] . " " . $row['city'] . ", " . $row['state'] . " " . $row['zip'];
					$numSpotsAndPrice = $['numOfSpots'] . " priced at " . $row['priceOfSpot'] . " each.";

					//proceed to print out the information
					echo $spotOwner;
					echo $address;
					echo $numSpotsAndPrice;

				}
				else
				{
					echo "Spot location could not be located, are you sure you have the correct information?";
				}
				
			}
			else
			{
				die("homeowner table not available " . mysql_error());
					
			}
			?>
	</body>
</html>