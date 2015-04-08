<?php 
	$spotsReserved = "";
	if (isset($_SESSION['homeId'])) {
		
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$homeId = $_SESSION['homeId'];

		//connect to sql database
		$conn = mysql_connect("localhost", "spotsuser", "spots123");

		//choose database
		$db = mysql_select_db("spots", $conn);

		$table = "SELECT spotId, price, taken, license from Spots where homeId = $homeId and taken = true";

		$result = mysql_query($table, $conn);

		$tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$out = "<h4>Spot # $tab &nbsp;&nbsp; Price $tab Reserved By $tab License Plate #<br>";
		if (mysql_num_rows($result) > 0) {
			while($row = mysql_fetch_assoc($result)) {
				$lic = $row["license"];
				$driverQuery = mysql_query("SELECT username from Driver where userId = (Select userId from Vehicle where licensePlate = '$lic')", $conn);
				$driver = mysql_fetch_row($driverQuery);

				$out .= $row["spotId"]. "$tab $tab". "$".$row["price"]. "$tab". $driver[0]. "$tab $tab" . $row["license"]. "<br>";
			}
		} else {
			$out = "<h4>No Results";
		}
		$out .= "</h4>";

		$_SESSION['spotsReserved'] = $out;
		
		mysql_close($conn);
	
	}
?>