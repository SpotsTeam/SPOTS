<html>
<head><title>Sign In</title></head>
<body>

<h3> Sign In </h3>
<form method = "get" action = "singinPage.php">
	Username: <input type = "text" name = "username" /><br />
	Password: <input type = "text" name = "password" /><br />
	<input type = "submit" name = "submit" value = "submit form"/>
	</form>

	
 
<?
//  <form method="get" action="signinPage.php">
//  		<input type="submit" value="HOME PAGE">
//  	</form>
 		if(isset($_GET['username'])) {
 			$username = $_GET['username'];
 			$password = $_GET['password'];
 			echo "Your username is $username";
 			echo "Your password is $password";
 			}


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

//			$insert = "INSERT INTO Driver (username, fname, lname, email, password, street, city, state, zip, carModel, licensePlate) VALUES ('$username', '$fname', '$lname', '$email', '$password', '$address', '$city', '$state', $zipcode, '$carModel', '$licensePlate')";
			
			if(mysql_query('username') == $username){
				echo "Hey - $username";
			} else {
				echo "Error";
			}
			if(mysql_query('password') == $password){
				echo "You - $password";
			} else {
				echo "Error";
			}
							
			
			echo "You are signed in as $username";



?>
 

	
</form>
</body>
</html>