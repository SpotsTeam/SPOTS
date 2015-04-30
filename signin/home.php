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

<<<<<<< HEAD
		
=======
// <<<<<<< HEAD
		
// =======
// 		$homeQuery = mysql_query("SELECT address, city, state FROM Home where userId = (SELECT userId from Homeowner where username = '$username')", $conn);

// 		$homeRows = mysql_fetch_row($homeQuery);
// 		$home = $homeRows[0].", " . $homeRows[1] . ", " . $homeRows[2];
// >>>>>>> 69bef9fb2cfe3cd3e4bed2e53072520b07fb9a77
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a

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
<<<<<<< HEAD
=======
// =======
// 		// $table = "SELECT price, taken, license from Spots where homeId = (Select homeId from Home where userId = (Select userId from Homeowner where username = '$username'))";

// 		// $result = mysql_query($table, $conn);

// 		// $tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
// 		// $out = "<h2>Price $tab Taken $tab License<br>";
// 		// if (mysql_num_rows($result) > 0) {
// 		// 	while($row = mysql_fetch_assoc($result)) {
// 		// 		$out .= "$".$row["price"] . "$tab" . $row["taken"] . "$tab". $row["license"] . "<br>";
// 		// 	}
// 		// } else {
// 		// 	$out .= "<h2>No results";
// 		// }
// 		// $out .= "</h2>";

// 		$_SESSION['name'] = $name;
// 		$_SESSION['home'] = $home;
// 		$_SESSION['homeId'] = $homeId;
// 		//$_SESSION['table'] = $out;
		
// >>>>>>> 69bef9fb2cfe3cd3e4bed2e53072520b07fb9a77
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
		mysql_close($conn);
		
	}
?>