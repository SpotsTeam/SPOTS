<html>
<head><title>SPOTS</title></head>
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
			$spots = $_POST['spots'];
			echo "<h1> Welcome Homeowner $name </h1>";
			echo "<h2> Your Username is: $username </h2>";
			echo "<h2> Address: $address, $city, $state, $zipcode</h2>";
			echo "<h2> Spots available to park: $spots </h2>";
		}
	?>
</body>
</html>