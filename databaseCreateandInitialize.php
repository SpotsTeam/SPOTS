<html>
	<head><title> Database Creation and Initliazaiton </title></head>
	<body>
	<?
		$serverName = "localhost";

		//here we're going to use the root because it would be easier
		$username = "root";
		$password = "nightcrawler";
		$database = "spots";

		// Create connection
		$conn = mysql_connect($servername, $username, $password, $database);
		// Check connection
		if (!$conn) 
		{
    		die("Connection failed: " . $conn->mysql_error());
		}	 

		//assuming connection worked we not create tables

		//homeowner should have an address, a name, number of spots, and price of spot

		$tableHome = "create table homeowner(fname varchar(50), lname varchar(50), streetAddress varchar(75), numSpots int, priceOfSpot int)";
		if($conn->mysql_query($tableHome) == TRUE)
		{
			echo "homeowner table created";
		}
		else
		{
			echo "homeowner table not created " . $conn->mysql_error();
		}

		//driver needs a car, license plate, name

		$tableDriver = "create table driver(fname varchar(50), lname varchar(50), carModel varchar(50), licensePlate int)";

		//make sure the table has been created
		if($conn->mysql_query($tableDriver) == TRUE)
		{
			echo "homeowner table created";
		}
		else
		{
			echo "homeowner table not created " . $conn->mysql_error();
		}

		$table