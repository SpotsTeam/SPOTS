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
	<form method = "post" action="homeownerPage.php">
		Username: <input type="text" name="username" /><br/>
		Password: <input type="text" name="password" /><br/>
		Full Name: <input type="text" name="name" /><br/>
		Enter Address:</br>
		<span style="padding: 0 20px">&nbsp;</span>Street: <input type="text" name="address" /><br/>
		<span style="padding: 0 20px">&nbsp;</span>City: <input type="text" name="city" /><br/>
		<span style="padding: 0 20px">&nbsp;</span>State: <select name="state"> 
						<option value="AL">AL</option>
						<option value="AK">AK</option>
						<option value="AZ">AZ</option>
						<option value="AR">AR</option>
						<option value="CA">CA</option>
						<option value="CO">CO</option>
						<option value="CT">CT</option>
						<option value="DE">DE</option>
						<option value="FL">FL</option>
						<option value="GA">GA</option>
						<option value="HI">HI</option>
						<option value="ID">ID</option>
						<option value="IL">IL</option>
						<option value="IN">IN</option>
						<option value="IA">IA</option>
						<option value="KA">KS</option>
						<option value="KY">KY</option>
						<option value="LA">LA</option>
						<option value="ME">ME</option>
						<option value="MD">MD</option>
						<option value="MA">MA</option>
						<option value="MI">MI</option>
						<option value="MN">MN</option>
						<option value="MS">MS</option>
						<option value="MO">MO</option>
						<option value="MT">MT</option>
						<option value="NE">NE</option>
						<option value="NV">NV</option>
						<option value="NH">NH</option>
						<option value="NJ">NJ</option>
						<option value="NM">NM</option>
						<option value="NY">NY</option>
						<option value="NC">NC</option>
						<option value="ND">ND</option>
						<option value="OH">OH</option>
						<option value="OK">OK</option>
						<option value="OR">OR</option>
						<option value="PA">PA</option>
						<option value="RI">RI</option>
						<option value="SC">SC</option>
						<option value="SD">SD</option>
						<option value="TN">TN</option>
						<option value="TX">TX</option>
						<option value="UT">UT</option>
						<option value="VT">VT</option>
						<option value="VA">VA</option>
						<option value="WA">WA</option>
						<option value="WV">WV</option>
						<option value="WI">WI</option>
						<option value="WY">WY</option>
						<option value="DC">DC</option>
					</select></br>
		<span style="padding: 0 20px">&nbsp;</span>ZipCode: <input type="text" name="zipcode" /></br>
		How many parking spots are available? <input type="text" name="spots" /><br/>
		<input type="submit" />
	</form>
</body>

<html>
