<?php 
	$post = $_POST['cancel'];
	include("yourCar.php");
	$arr = explode(",", $post);
	echo "<h1>$arr[0]</h1>";
	echo "<h1>$arr[1]</h1>";
	$spotId = $arr[0];
	$homeId = $arr[1];
	

	$conn = mysql_connect("localhost", "spotsuser", "spots123");

	//choose database
	$db = mysql_select_db("spots", $conn);

	//make query for registering for a spot
	$query = "Update Spots set taken = false, license = NULL where spotId = $spotId and homeId = $homeId";

	$result = mysql_query($query, $conn);

	mysql_close();


?>