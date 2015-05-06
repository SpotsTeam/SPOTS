<?php 
	if (isset($_POST['spot'])) {
		include("yourCar.php");
		$out = $_POST['spot'];
		$arr = explode(",", $out);
		echo "<h1>$arr[0]</h1>";
		echo "<h1>$arr[1]</h1>";
		$spotId = $arr[0];
		$homeId = $arr[1];
		$license = $_SESSION['licenseP'];
		echo "License: $license";

		$conn = mysql_connect("localhost", "spotsuser", "spots123");

		//choose database
		$db = mysql_select_db("spots", $conn);

		//make query for registering for a spot
		$query = "Update Spots set taken = true, license = '$license' where spotId = $spotId and homeId = $homeId";

		$result = mysql_query($query, $conn);

		mysql_close();
		
	} 
	header("Location: listView.php");

?>