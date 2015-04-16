<?php 
	include("login.php");
	$home = "";
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

		

		$homeIdQuery = mysql_query("SELECT homeId FROM Home where userId = (SELECT userId from Homeowner where username = '$username')", $conn);

		$homeIdRows = mysql_fetch_row($homeIdQuery);
		$homeId = $homeIdRows[0];

		$_SESSION['name'] = $name;
		
		if (isset($_SESSION['homeId'])) {
			$homeId = $_SESSION['homeId'];
		} else {
			$_SESSION['homeId'] = $homeId;
		}

		$homeQuery = mysql_query("SELECT address, city, state FROM Home where homeId = '$homeId'", $conn);

		$homeRows = mysql_fetch_row($homeQuery);
		$home = $homeRows[0].", " . $homeRows[1] . ", " . $homeRows[2];


		$_SESSION['home'] = $home;		
		mysql_close($conn);
		
	}
?>