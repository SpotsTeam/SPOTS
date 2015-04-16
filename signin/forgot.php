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
>>>>>>> 1bd8214d859cf8df5e9dc5a7e881ae151ee67b1f
			
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

>>>>>>> 1bd8214d859cf8df5e9dc5a7e881ae151ee67b1f

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
>>>>>>> 1bd8214d859cf8df5e9dc5a7e881ae151ee67b1f
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
>>>>>>> 1bd8214d859cf8df5e9dc5a7e881ae151ee67b1f
				
			}

		} 
	?>
</body>
</html>