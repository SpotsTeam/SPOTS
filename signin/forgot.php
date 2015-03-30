<html>
<body>
	<?php 
		if(isset($_POST['email'])) {
			$email = $_POST['email'];

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
		} else {
			header "Location: /SPOTS/signin/forgotUserPass.html";
			exit;
		}





	?>
</body>
</html>