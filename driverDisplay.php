<html>
<head><title>SPOTS Driver Information Page</title></head>
<body>
	<?
		if(isset($_POST['username'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zipcode = $_POST['zipcode'];
			$carModel = $_POST['carModel'];
			$licensePlate = $_POST['licensePlate'];
			$email = $_POST['email'];

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