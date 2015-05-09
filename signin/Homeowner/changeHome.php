<?php 
	include("../login.php");
	$user = $_SESSION['username'];

	$conn = mysql_connect("localhost", "spotsuser", "spots123");

	//choose database
	$db = mysql_select_db("spots", $conn);

	$query = "SELECT address, homeId from Home natural join Homeowner where username = '$user'";

	$sql = mysql_query($query, $conn);

	$address = array();
	$homeId = array();
	$count = 0;
	if (mysql_num_rows($sql) > 0) {
		while($row = mysql_fetch_assoc($sql)) {
			$address[] = $row["address"];
			$homeId[] = $row['homeId'];
			$count += 1;
		}
	} else {
		$address[] = "No results";
	}

	if (isset($_POST['Home'])) {
		unset($_SESSION['homeId']);
		$_SESSION['homeId'] = $_POST['Home'];
		echo $_SESSION['homeId'];
		unset($_POST['Home']);
		header("Location: manageSpots.php");
		
	}
?>