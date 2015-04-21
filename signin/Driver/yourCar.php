<?php 
	include("../login.php");
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

		if ($rowNum == 0) {
			$car = "You have no cars registered. You can register them on your home page";
			$spotsParked = "None";
		} else {
			$car = "<h2><b>Your Car: </b>" .$rows[0]. " ".  $rows[1]."</h2>";
			$_SESSION['licenseP'] = $rows[2];
			$license = $rows[2];
			$parkedQuery = mysql_query("select address, city, state, price, phone, email from Spots natural join Home natural join Homeowner where license = '$license'", $conn);

		}

		$_SESSION['parked'] = "None";
		$_SESSION['car'] = $car;
		
		mysql_close($conn);
		
	}
?>