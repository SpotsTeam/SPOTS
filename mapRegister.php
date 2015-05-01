<?php 
	if (isset($_POST['spot'])) {
		include("signin/Driver/yourCar.php");
		$out = $_POST['spot'];
		echo "$out";
		$homeId = $out;
		$license = $_SESSION['licenseP'];
		echo "License: $license";

		$conn = mysql_connect("localhost", "spotsuser", "spots123");

		//choose database
		$db = mysql_select_db("spots", $conn);

		$selectSpot = mysql_query("SELECT spotId from Spots where homeId = $homeId and taken = false limit 1", $conn);

		$row = mysql_fetch_array($selectSpot);
		if ($row == 0) {
			?> <script> alert("Parking Currently not Available<br>Please try again later!"); </script> 
			<?php
		} else {
			$spotId = $row[0];

			//make query for registering for a spot
			$query = "Update Spots set taken = true, license = '$license' where spotId = $spotId and homeId = $homeId";

			$result = mysql_query($query, $conn);	
		}

		mysql_close();
		
		header("Location: signin/homePage.php");
}

?>