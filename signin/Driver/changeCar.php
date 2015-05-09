<?php 
	include("../login.php");
	$user = $_SESSION['username'];

	$conn = mysql_connect("localhost", "spotsuser", "spots123");

	//choose database
	$db = mysql_select_db("spots", $conn);

	$query = "SELECT licensePlate, carModel from Vehicle natural join Driver where username = '$user'";

	$sql = mysql_query($query, $conn);

	$licensePlate = array();
	$carModel = array();
	$count = 0;
	if (mysql_num_rows($sql) > 0) {
		while($row = mysql_fetch_assoc($sql)) {
			$licensePlate[] = $row["licensePlate"];
			$carModel[] = $row['carModel'];
			$count += 1;
		}
	} else {
		$licensePlate[] = "No results";
	}

	if (isset($_POST['chooseCar'])) {
		unset($_SESSION['licenseP']);
		$_SESSION['licenseP'] = $_POST['chooseCar'];
		echo $_SESSION['licenseP'];
		unset($_POST['chooseCar']);
		header("Location: ../homePage.php");
		
	}
?>