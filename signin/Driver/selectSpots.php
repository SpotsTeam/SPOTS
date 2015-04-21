<?php 
	//include("../login.php");

	$conn = mysql_connect("localhost", "spotsuser", "spots123");

	//choose database
	$db = mysql_select_db("spots", $conn);

	$order = "address";


	$query = "SELECT spotId, price, address, city, state, zipcode from Spots natural join Home where taken = false order by $order";

	$sql = mysql_query($query, $conn);

	$spotId = array();
	$price = array();
	$address = array();
	$city = array();
	$state = array();
	$zipcode = array();
	$count = 0;
	if (mysql_num_rows($sql) > 0) {
		while($row = mysql_fetch_assoc($sql)) {
			$spotId[] = $row["spotId"];
			$price[] = $row['price'];
			$address[] = $row['address'];
			$city[] = $row['city'];
			$state[] = $row['state'];
			$zipcode[] = $row['zipcode'];
			$count += 1;
		}
	} else {
		$address[] = "No results";
	}

	

?>