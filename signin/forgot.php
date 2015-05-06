<html>
<body>
	<?php 
		
<<<<<<< HEAD
		if(isset($_REQUEST['email'])) {
			$email = $_REQUEST['email'];
			$select = $_REQUEST['select'];
			$admin_email = "erik.gabe@gmail.com";
			$subject = "Hello";
			$comment = "Hi";
			
			// if (mail($email, "$subject", $comment, "From: " . $admin_email)) {
			// 	echo "mail sent";
			// } else {
			// 	echo "mail not sent";
			// }
=======


		if(isset($_POST['email'])) {
			$email = $_POST['email'];
			$select = $_POST['select'];

>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2
			
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

<<<<<<< HEAD
			$email_from = "erik.gabe@gmail.com";
=======
>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2

			if ($select == 'Driver') {
				echo "Driver";
				$result = mysql_query($driverQuery);
				$row = mysql_fetch_row($result);
<<<<<<< HEAD
				$msg = 'username = ' . $row[0] . '\n password = ' .$row[1];
				$msg = wordwrap($msg,70);
				@mail($email, "SPOTS Driver Username/Password", $msg);

=======

				$msg = 'username = $row[0] \n password = $row[1]';
				$msg = wordwrap($msg,70);
				mail("$email", "SPOTS Driver Username/Password", $msg);
>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2
			} else if ($select == 'Homeowner') {
				echo "Homeowner";
				$result = mysql_query($homeQuery);
				$row = mysql_fetch_row($result);
<<<<<<< HEAD
				$msg = 'username = ' . $row[0] . '\n password = ' .$row[1];				
				$msg = wordwrap($msg,70);
				mail($email, "SPOTS Homeowner Username/Password", $msg);
=======

				$msg ='username = $row[0] \n password = $row[1]';
				$msg = wordwrap($msg,70);
				mail('$email', 'SPOTS Homeowner Username/Password', $msg);
>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2
				
			}

		} 
	?>
</body>
</html>