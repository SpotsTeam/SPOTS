<?php 

	$conn = mysql_connect("localhost", "spotsuser", "spots123");

	//choose database
	$db = mysql_select_db("spots", $conn);

	if (isset($_POST['updateCarMake'])) {  //updating Car information
		$newCarMake = $_POST['updateCarMake'];
		$newCarModel = $_POST['updateCarModel'];
		$newLicense = $_POST['updateLicense'];
		$oldLicense = $_POST['oldLicense'];

		$checkLicense = mysql_query("SELECT * from Vehicle where licensePlate = '$newLicense'", $conn);
		$userId = mysql_query("SELECT userId from Vehicle natural join Driver where licensePlate = '$oldLicense'", $conn);
		$id = mysql_fetch_row($userId);
		echo $id[0];
		if (mysql_num_rows($checkLicense) > 0) {
			$error = "not a valid license plate";
		} else {
			$query = "INSERT into Vehicle values ('$newLicense', '$newCarMake', '$newCarModel', $id[0])";
			mysql_query($query, $conn);
			$error = "";
		}

		echo $error;
		echo "$newLicense";

		unset($_POST['oldLicense']);
		unset($_POST['updateCarModel']);
		unset($_POST['updateLicense']);
		unset($_POST['updateCar']);

	} else if (isset($_POST['updateAddress'])) {  //updating Address information
		$newAddress = $_POST['updateAddress'];
		$newState = $_POST['newState'];
		$newCity = $_POST['newCity'];
		$username = $_SESSION['username'];

		$query = "UPDATE Driver set street = '$newAddress', city = '$newCity', state = '$newState' where username = '$username'";
		mysql_query($query, $conn);

		unset($_POST['updateAddress']);

	} else if (isset($_POST['updateFirstName'])) {  //updating the users name
		$newFirstName = $_POST['updateFirstName'];
		$newLastName = $_POST['newLastName'];
		$username = $_SESSION['username'];

		$query = "UPDATE Driver set fName = '$newFirstName', lName = '$newLastName' where username = '$username'";
		mysql_query($query, $conn);


		unset($_POST['newLastName']);
		unset($_POST['updateFirstName']);

	} else if (isset($_POST['updateEmail'])) { //updating email information
		$newEmail = $_POST['updateEmail'];
		$username = $_SESSION['username'];

		$query = "UPDATE Driver set email = '$newEmail' where username = '$username'";
		mysql_query($query, $conn);


		unset($_POST['updateEmail']);

	} else if (isset($_POST['updatePhone'])) { //updating phone number
		$newPhone = $_POST['updatePhone'];
		$username = $_SESSION['username'];

		$query = "UPDATE Driver set phone = '$newPhone' where username = '$username'";
		mysql_query($query, $conn);

		unset($_POST['updatePhone']);
	} else if (isset($_POST['updateLicense'])) { //updates license plate number
		$newLicense = $_POST['updateLicense'];
		$oldLicense = $_POST['oldLicense'];

		$checkLicense = mysql_query("SELECT * from Vehicle where licensePlate = '$newLicense'", $conn);
		if (mysql_num_rows($checkLicense) > 0) {
			$error = "not a valid license plate";
		} else {
			$query = "UPDATE Vehicle set licensePlate = '$newLicense' where licensePlate = '$oldLicense'";
			mysql_query($query, $conn);
			$error = "";
		}

		unset($_POST['updateLicense']);
	} else {
		//nothing to update, return to page
	}

	mysql_close($conn);

	header("Location: editInfo.html");



?>