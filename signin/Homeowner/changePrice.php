<?php 
	include("../login.php");
	if (isset($_SESSION['homeId'])) {
		$homeId = $_SESSION['homeId'];
		$newPrice = $_POST['newPrice'];
		//connect to sql database
		$conn = mysql_connect("localhost", "spotsuser", "spots123");
<<<<<<< HEAD

		//choose database
		$db = mysql_select_db("spots", $conn);

=======
		//choose database
		$db = mysql_select_db("spots", $conn);
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
		//Fetch info for users
		$query = mysql_query("UPDATE Spots SET price = CASE 
								WHEN taken = false THEN $newPrice 
								ELSE price 
							END
							WHERE homeId = $homeId", $conn);
<<<<<<< HEAD

		//should be able to just use a case statement in order to update the price
		// will experiment with another database

		mysql_close($conn);

=======
		//should be able to just use a case statement in order to update the price
		// will experiment with another database
		mysql_close($conn);
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
		header("Location: manageSpots.php");
		
	}

<<<<<<< HEAD

=======
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
?>