<html>
<body>
	<?php 
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
			$select = $_POST['select'];
			
			$servername = "localhost";
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

			$driverQuery = "Select username, password from Driver where email = '$email'";
			$homeQuery = "Select username, password from Homeowner where email = '$email'";


			if ($select == 'Driver') {
				echo "Driver";
				$result = mysql_query($driverQuery);
				$row = mysql_fetch_row($result);

				$msg = 'username = $row[0] \n password = $row[1]';
				$msg = wordwrap($msg,70);
				mail("$email", "SPOTS Driver Username/Password", $msg);

			} else if ($select == 'Homeowner') {
				echo "Homeowner";
				$result = mysql_query($homeQuery);
				$row = mysql_fetch_row($result);

				$msg ='username = $row[0] \n password = $row[1]';
				$msg = wordwrap($msg,70);
				mail('$email', 'SPOTS Homeowner Username/Password', $msg);
			}

		} 
	?>
</body>
</html>