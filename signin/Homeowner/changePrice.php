<?php 
	include("../login.php");
	if (isset($_SESSION['homeId'])) {
		$homeId = $_SESSION['homeId'];
		$newPrice = $_POST['newPrice'];
		//connect to sql database
		$conn = mysql_connect("localhost", "spotsuser", "spots123");

		//choose database
		$db = mysql_select_db("spots", $conn);

		//Fetch info for users
		$query = mysql_query("UPDATE Spots set price = $newPrice where homeId = $homeId", $conn);

		mysql_close($conn);

		header("Location: manageSpots.php");
		
	}


?>