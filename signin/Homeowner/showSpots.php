<?php 

	$spots = "";
	if (isset($_SESSION['homeId'])) {
		
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$homeId = $_SESSION['homeId'];

		//connect to sql database
		$conn = mysql_connect("localhost", "spotsuser", "spots123");

		//choose database
		$db = mysql_select_db("spots", $conn);

		$table = "SELECT spotId, price, taken, license from Spots where homeId = $homeId and taken = false";

		$result = mysql_query($table, $conn);

		$tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$out = "<h4>Spot # $tab &nbsp;&nbsp; Price<br>";
		if (mysql_num_rows($result) > 0) {
			while($row = mysql_fetch_assoc($result)) {
				$out .= $row["spotId"]. "$tab $tab". "$".$row["price"]."<br>";
			}
		} else {
			$out .= "<h4>No results";
		}
		$out .= "</h4>";

		$_SESSION['spots'] = $out;
		
		mysql_close($conn);
	
	}
?>