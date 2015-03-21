<html>
<head><title>SPOTS</title></head>
<body>
	<form method="post" action="index.html">
		<input type="submit" value="HOME PAGE">
	</form>
	<?

		//again we make the connection to the server
		$serverName = "localhost";

		//here we're going to use the root because it would be easier
		//WILL BE CHANGED EVENUTALLY TO A USER
		$username = "root";
		$password = "nightcrawler";
		$database = "spots";

		// Create connection, we're assuming that there is already a database created
		$conn = mysql_connect($servername, $username, $password);

		// Check connection
		if (!$conn) 
		{
			//if the connection fails then we kill the whole thing
    		die("Connection failed: " . mysql_error());
		}	


		if(isset($_POST['username'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zipcode = $_POST['zipcode'];
			$spots = $_POST['spots'];
			$email = $_POST['email'];
			echo "<h1> Welcome Homeowner $name </h1>";
			echo "<h2> Your Username is: $username </h2>";
			echo "<h2> Your email is: $email </h2>";
			echo "<h2> Address: $address, $city, $state, $zipcode</h2>";
			echo "<h2> Spots available to park: $spots </h2>";

			//choose the database
			mysql_select_db("spots");

			//insert values into table
			//NEED TO GO AHEAD AND FIX THIS
			$sqlDriver = "INSERT INTO homeowner " .
						"(name, username, password, streetAddress, numSpots) " .
						"VALUES('$name', '$username', '$password', '$address', $spots)";

			$storeVal = mysql_query($sqlDriver, $conn);

			if($storeVal)
			{
				echo "data entered sucessfully, welcome to our application";
				//close the connection to the database
				mysql_close($conn);
			}
			else
			{
				echo "data was not entered, please check the file " . mysql_error();
				echo "<br/>";
			}
		}
	?>
</body>
</html>