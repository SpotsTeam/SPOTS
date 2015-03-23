<html>
<head><title>SPOTS Driver Information Page</title></head>
<body>
	<form method="post" action="index.html">
		<input type="submit" value="HOME PAGE">
	</form>
	<?php
		if(isset($_POST['eventName'])) {
			$eventName = $_POST['eventName'];
			$startMonth = $_POST['startMonth'];
			$startDay = $_POST['startDay'];
			$startYear = $_POST['startYear'];
			$endMonth = $_POST['endMonth'];
			$endDay = $_POST['endDay'];
			$endYear = $_POST['endYear'];
			$category = $_POST['category'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zipcode = $_POST['zipcode'];

			$servername = "localhost";

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
				echo "database successfully connected";
			}

			mysql_select_db($database);

			$insert = "INSERT INTO Events (eventname, startDate, endDate, category, address, city, state, zipcode) VALUES ('$eventName', '$startYear-$startMonth-$startDay', '$endYear-$endMonth-$endDay', '$category', '$address', '$city', '$state', $zipcode)";

			if (mysql_query($insert) === TRUE) {
				echo "New Record created successfully";
			} else {
				echo "Error: " . $insert . "<br>" . mysql_error();
			}



			//print up the information of the driver
			echo "<h2>$eventName has been created</h2>";
		}
	?>
</body>
</html>