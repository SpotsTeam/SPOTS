<html>
	<head><title> Database Creation and Initliazaiton </title></head>
	<body>
	<?php
		$servername = "localhost";

		//here we're going to use the root because it would be easier
		//WILL BE CHANGED EVENUTALLY TO A USER
		$username = "root";
		$password = "sharpclaw";
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


		mysql_select_db("spots");
		//assuming connection worked we then create tables

		//HOMEOWNER NEEDS A NAME, STREET ADDRESS, USERNAME, PASSWORD, NUMSPOTS
		$tableHome = "CREATE TABLE homeowner(name VARCHAR(50), username VARCHAR(50), password VARCHAR(50), streetAddress VARCHAR(75), numSpots INT)";

		$valHome = mysql_query("select 1 from homeowner");

		if($valHome == TRUE)
		{
			echo "homeowner table exists";
			echo "<br />";
		}
		else
		{
			//have to make sure that the connection is working
			if(mysql_query($tableHome, $conn) == TRUE)
			{
				echo "homeowner table created";
				echo "<br />";
			}
			else
			{
				//it'd be easier for me to go ahead and kill the program so that way we can figure out what is the problem
				die("homeowner table not created " . mysql_error());
				echo "<br />";
			}
		}
		

		//DRIVER NEEDS A NAME, USERNAME, PASSWORD, STREET ADDRESS, CAR MODEL, LICENSE PLATE
		$tableDriver = "CREATE TABLE driver(name VARCHAR(50), username VARCHAR(50), password VARCHAR(50), carModel VARCHAR(50), licensePlate INT)";
		mysql_select_db("spots");

		$valDriver = mysql_query("select 1 from driver");

		if($valDriver == TRUE)
		{
			echo "Driver table exists";
			echo "<br />";
		}
		else
		{
			//make sure the table has been created
			if(mysql_query($tableDriver, $conn) == TRUE)
			{
				echo "driver table created";
				echo "<br />";
			}
			else
			{
				//again kill the program if this does not work
				die("driver table not created " . mysql_error());
				echo "<br />";
			}	
		}
		

		//events should contain name, date, location
		$tableEvent = "CREATE TABLE event(eventName VARCHAR(50), location VARCHAR(60))";

		mysql_select_db("spots");

		$val = mysql_query("select 1 from event");

		if($val == TRUE)
		{
			echo "event table exists";
			echo "<br />";
		}
		else
		{
			//make sure the table has been created
			if(mysql_query($tableEvent, $conn) == TRUE)
			{
				echo "event table created";
				echo "<br />";
			}
			else
			{
				die("event table not created " . mysql_error());
				echo "<br />";
			}	
		}
		

	?>

</body>
</html>