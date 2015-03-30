<html>
<body>
	<?php

	if(isset($_POST['username'])) 
	{
 		$username = $_POST['username'];
 		$password = $_POST['password'];
 		echo "Your username is $username";
 		echo "Your password is $password";
 	


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

		$selectUsername = "SELECT username, password FROM Homeowner WHERE username = '$username'";
		
		$result = mysql_query($selectUsername);
		
		$row = mysql_fetch_row($result);
		if ($row[0] != $username || $row[1] != $password)
		{
			header(('Location: /SPOTS/signin/error.html'));
			exit;
		}
		else
		{
			//echo $row[1];
			header('Location: /SPOTS/signin/success.html');
			exit;
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
	}

		?>
</body>
</html>
