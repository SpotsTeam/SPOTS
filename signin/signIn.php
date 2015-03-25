<html>
<body>
	<?php

	if(isset($_POST['username'])) 
	{
 		$username = $_POST['username'];
 		$password = $_POST['password'];
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
		} 
		else 
		{
			echo "database successfully connected";
		}

		mysql_select_db($database);

		$selectUsername = "SELECT username FROM Driver WHERE username = '$username'";
		$selectPassword = "SELECT password FROM Driver WHERE password = '$password'";
		$query = "SELECT * FROM Driver WHERE username = $username";
		$query = $query . $_POST['username'] . " and password = $password" . $_POST['password'] . "";

		$result = mysql_query($query);
		if (mysql_num_rows($result) == 0)
		{
			echo "BOO";
			header(('Location: /SPOTS/signin/error.html'));
		}
		else
		{
			echo "YAY";
			header('Location: /SPOTS/signin/success.html');
		}

		// if(mysql_query($selectUsername) == '$username')
		// {
		// 	header ('Location: /SPOTS/signin/success.html');
		// } 
		// else
		// {
		// 	header ('Location: /SPOTS/signin/error.html');
		// }
		// if(mysql_query($selectPassword) == '$password')
		// {
		// 	echo "You - $password";
		// } 
		// else
		// {
		// 	echo "Error";
		// }

		?>
</body>
</html>
