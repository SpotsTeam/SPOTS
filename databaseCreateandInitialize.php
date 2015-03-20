<html>
	<head><title> Database Creation and Initliazaiton </title></head>
	<body>
	<?
		$serverName = "localhost";

		//here we're going to use the root because it would be easier
		//WILL BE CHANGED EVENUTALLY TO A USER
		$username = "root";
		$password = "nightcrawler";
		$database = "spots";

		// Create connection, we're assuming that there is already a database created
		$conn = mysql_connect($servername, $username, $password, $database);

		// Check connection
		if (!$conn) 
		{
			//if the connection fails then we kill the whole thing
    		die("Connection failed: " . $conn->mysql_error());
		}	 

		//assuming connection worked we then create tables

		//HOMEOWNER NEEDS A NAME, STREET ADDRESS, USERNAME, PASSWORD, NUMSPOTS
		$tableHome = "CREATE TABLE homeowner(fname VARCHAR(50), lname VARCHAR(50), username VARCHAR(50), password VARCHAR(50), streetAddress VARCHAR(75), numSpots INT)";

		//have to make sure that the connection is working
		if($conn->mysql_query($tableHome) == TRUE)
		{
			echo "homeowner table created";
		}
		else
		{
			//it'd be easier for me to go ahead and kill the program so that way we can figure out what is the problem
			die("homeowner table not created " . $conn->mysql_error());
		}

		//DRIVER NEEDS A NAME, CAR MODEL, LICENSE PLATE
		$tableDriver = "CREATE TABLE driver(fname VARCHAR(50), lname VARCHAR(50), carModel VARCHAR(50), licensePlate INT)";

		//make sure the table has been created
		if($conn->mysql_query($tableDriver) == TRUE)
		{
			echo "homeowner table created";
		}
		else
		{
			//again kill the program if this does not work
			die("homeowner table not created " . $conn->mysql_error());
		}

		//events should contain name, date, location
		$tableEvent = "create table event(eventName varchar(50), eventDate DATE(), location varchar(60))";

		//make sure the table has been created
		if($conn->mysql_query($tableEvent) == TRUE)
		{
			echo "event table created";
		}
		else
		{
			echo "event table not created " . $conn->mysql_error();
		}