<?php 
	include("../login.php");
	if (isset($_SESSION['homeId'])) {
		$homeId = $_SESSION['homeId'];
		$newPrice = $_POST['newPrice'];
		//connect to sql database
		$conn = mysql_connect("localhost", "spotsuser", "spots123");
<<<<<<< HEAD
<<<<<<< HEAD

		//choose database
		$db = mysql_select_db("spots", $conn);

=======
=======
>>>>>>> 03688d131052966f8a6bfb67015cd8e80857ed6f
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
<<<<<<< HEAD
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
=======
>>>>>>> 03688d131052966f8a6bfb67015cd8e80857ed6f
		header("Location: manageSpots.php");
		
	}

<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
=======
>>>>>>> 03688d131052966f8a6bfb67015cd8e80857ed6f
?>