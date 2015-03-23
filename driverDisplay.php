<html>
<head><title>SPOTS Driver Information Page</title></head>
<body>
	<form method="post" action="index.html">
		<input type="submit" value="HOME PAGE">
	</form>
	<?
		if(isset($_POST['username'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zipcode = $_POST['zipcode'];
			$carModel = $_POST['carModel'];
			$licensePlate = $_POST['licensePlate'];
			$email = $_POST['email'];

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

			$insert = "INSERT INTO Driver (username, fname, lname, email, password, street, city, state, zip, carModel, licensePlate) VALUES ('$username', '$fname', '$lname', '$email', '$password', '$address', '$city', '$state', $zipcode, '$carModel', '$licensePlate')";

			if (mysql_query($insert) === TRUE) {
				echo "New Record created successfully";
			} else {
				echo "Error: " . $insert . "<br>" . mysql_error();
			}



			//print up the information of the driver
			echo "<h1> Welcome Driver $name </h1>";
			echo "<h2> Your Username is: $username </h2>";
			echo "<h2> Your email is: $email </h2>";
			echo "<h2> Address: $address, $city, $state, $zipcode</h2>";
			echo "<h2> Your car is a $carModel and your license plate is $licensePlate";
		}
	?>
</body>
</html>