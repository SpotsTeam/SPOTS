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
	<h2>Please Sign Up as Homeowner</h2>
	<form method = "post" action="sample.php">
		Username: <input type="text" name="username" /><br/>
		Password: <input type="text" name="password" /><br/>
		Full Name: <input type="text" name="name" /><br/>
		Enter Address:</br>
		<span style="padding: 0 20px">&nbsp;</span>Street: <input type="text" name="address" /><br/>
		<span style="padding: 0 20px">&nbsp;</span>City: <input type="text" name="city" /><br/>
		<span style="padding: 0 20px">&nbsp;</span>State: <select name="state"> <option value="TX">TX</option></select></br>
		<span style="padding: 0 20px">&nbsp;</span>ZipCode: <input type="text" name="zipcode" /></br>
		How many parking spots are available? <input type="text" name="spots" /><br/>
		<input type="submit" />
	</form>
</body>

<html>
