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
		$query = mysql_query("UPDATE Spots SET price = CASE 
								WHEN taken = false THEN $newPrice 
								ELSE price 
							END
							WHERE homeId = $homeId", $conn);
		//should be able to just use a case statement in order to update the price
		// will experiment with another database
		mysql_close($conn);
		header("Location: manageSpots.php");
		
	}
?>