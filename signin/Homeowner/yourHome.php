<?php 
	include("login.php");
	$name = "";
	if (isset($_SESSION['username'])) {
		
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];

		//connect to sql database
		$conn = mysql_connect("localhost", "spotsuser", "spots123");

		//choose database
		$db = mysql_select_db("spots", $conn);

		//Fetch info for users
		$query = mysql_query("SELECT fname, lname FROM Homeowner where username = '$username'", $conn);

		$rows = mysql_fetch_row($query);
		$rowNum = mysql_num_rows($query);

		if ($rows[0] == "" && $rows[1] == "") {
			$name = "<h2>Welcome $username</h2>";
		} else {
			$name = "<h2>Welcome " .$rows[0]. " ".  $rows[1]."</h2>";
		}

		$addressQuery = mysql_query("SELECT address, city, state from Home where userId = (select userId from Homeowner where username = '$username')", $conn);

		$addressRow =

		$numOfSpotsAvailable = "SELECT count(spotId) from Spots where homeId = (Select homeId from Home where userId = (Select userId from Homeowner where username = '$username')) and taken = false";
		$numOfSpotsTaken = "SELECT count(spotId) from Spots where homeId = (Select homeId from Home where userId = (Select userId from Homeowner where username = '$username')) and taken = true";

		$spotsAvailableQuery = mysql_query($numOfSpotsAvailable, $conn);
		$spotsTakenQuery = mysql_query($numOfSpotsTaken, $conn);

		$SArow = mysql_fetch_row($spotsAvailableQuery);
		$STrow = mysql_fetch_row($spotsTakenQuery);

		$spotsAvailable = "<h2>Spots Available: &nbsp;" .$SArow[0] ."</h2>";
		$spotsTaken = "<h2>Spots Filled: &nbsp;". $STrow[0] ."</h2>";

		$_SESSION['name'] = $name;
		$_SESSION['spotsAvailable'] = $spotsAvailable;
		$_SESSION['spotsTaken'] = $spotsTaken;
		
		mysql_close($conn);
		
	}
?>