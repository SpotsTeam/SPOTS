<?php 
	if (is_file("signin/login.php")) {
		include("signin/login.php");
	} else {
		include("../login.php");
	}
	
	$car = "";
	if (isset($_SESSION['username'])) {
		
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];

		//connect to sql database
		$conn = mysql_connect("localhost", "spotsuser", "spots123");

		//choose database
		$db = mysql_select_db("spots", $conn);

		//Fetch info for users
		$query = mysql_query("SELECT carMake, carModel, licensePlate FROM Vehicle natural join Driver where Vehicle.userId = (Select userId from Driver where username = '$username')", $conn);

		$rows = mysql_fetch_row($query);
		$rowNum = mysql_num_rows($query);
		$count =0;
		if ($rowNum == 0) {
			$car = "You have no cars registered. You can register them on your home page";
			$spotsParked = "None";
		} else {
			$car = "<h2><b>Your Car: </b>" .$rows[0]. " ".  $rows[1]."</h2>";
			$_SESSION['licenseP'] = $rows[2];
			$license = $rows[2];
			$addressArr = array();
			$cityArr = array();
			$stateArr = array();
			$priceArr = array();
			$phoneArr = array();
			$emailArr = array();
			$spotIdArr = array();
			$homeIdArr = array();
			$parkedQuery = mysql_query("select homeId, spotId, address, city, state, price, phone, email from Spots natural join Home natural join Homeowner where license = '$license'", $conn);
			if (mysql_num_rows($parkedQuery)) {
				while($row = mysql_fetch_assoc($parkedQuery)) {
					$count += 1;
					$addressArr[] = $row['address'];
					$cityArr[] = $row['city'];
					$stateArr[] = $row['state'];
					$priceArr[] = $row['price'];
					$phoneArr[] = $row['phone'];
					$emailArr[] = $row['email'];
					$spotIdArr[] = $row['spotId'];
					$homeIdArr[] = $row['homeId'];
					$park = "";
				}
			} else {
				$park = "None";
			}
		}

		$_SESSION['parked'] = "None";
		$_SESSION['car'] = $car;
		
		mysql_close($conn);
		
	}
?>