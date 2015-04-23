<?php 
	//include("../login.php");

	$conn = mysql_connect("localhost", "spotsuser", "spots123");

	//choose database
	$db = mysql_select_db("spots", $conn);

	if (isset($_POST['groupBy'])) {
		$g = $_POST['groupBy'];
		if ($g == "spotNumber") {
			$order = "spotId";
		} else if ($g == "price") {
			$order = "price";
		} else if ($g == "address") {
			$order = "address";
		} else if ($g == "city") {
			$order = "city";
		} else if ($g == "state") {
			$order = "state";
		} else if ($g == "zipcode") {
			$order = "zipcode";
		} else {
			$order = "address";
		}
	} else {
		$order = "address";
	}
	
	if(isset($_POST['city'])){
		$city = $_POST['city'];
	} else {
		$city = "Dallas";
	}


	$query = "SELECT spotId, price, address, city, state, zipcode, homeId from Spots natural join Home where taken = false and city = '$city' order by $order";

	$sql = mysql_query($query, $conn);

	$spotId = array();
	$price = array();
	$address = array();
	$city = array();
	$state = array();
	$zipcode = array();
	$homeId = array();
	$count = 0;
	if (mysql_num_rows($sql) > 0) {
		while($row = mysql_fetch_assoc($sql)) {
			$spotId[] = $row["spotId"];
			$price[] = $row['price'];
			$address[] = $row['address'];
			$city[] = $row['city'];
			$state[] = $row['state'];
			$zipcode[] = $row['zipcode'];
			$homeId[] = $row['homeId'];
			$count += 1;
		}
	} else {
		$address[] = "No results";
	}

	

?>