<?php 
	if (isset($_SESSION['homeId'])) {
		
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$homeId = $_SESSION['homeId'];

		//connect to sql database
		$conn = mysql_connect("localhost", "spotsuser", "spots123");

		//choose database
		$db = mysql_select_db("spots", $conn);

		

		mysql_close();
	}
?>