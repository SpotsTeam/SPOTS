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

		$out = "<thead> <th>Spot ID</th> <th>Price</th> <th>Reserved By</th> <th>License Plate</th> <th>Phone</th></thead><tbody>";
		if (mysql_num_rows($result) > 0) {
			while($row = mysql_fetch_assoc($result)) {
				$lic = $row["license"];
				$driverQuery = mysql_query("SELECT username, phone from Driver where userId = (Select userId from Vehicle where licensePlate = '$lic')", $conn);
				$driver = mysql_fetch_row($driverQuery);

				$out .= "<tr><td>". $row["spotId"]. "</td><td>". "$".$row["price"]. "</td><td>". $driver[0]. "</td><td>". $row["license"]. "</td><td>". $driver[1] ."</td></tr>";
			}
		} else {
			$out = "<h4>No Results";
		}
		$out .= "</h4>";

		$_SESSION['spotsReserved'] = $out;
		
		mysql_close($conn);

	}
?>