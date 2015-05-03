<?php 
//require '../composer/vendor/autoload.php';

	// if (isset($_SESSION['login_user'])) {
 //         header("location: homePage.php");
 //    }
	
	session_start();
	//echo"YO";
	if (isset($_POST['username'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];
		$usertype = $_POST['select'];
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;
		$_SESSION["select"] = $usertype;
		
		//connect to sql database
		$conn = mysql_connect("localhost", "spotsuser", "spots123");
		//echo"hey";
		//to protect MySQL injection for Secutioty purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		$usertype = stripslashes($usertype);
		$usertype = mysql_real_escape_string($usertype);
		//choose database
		$db = mysql_select_db("spots", $conn);
		//Fetch info for users
		$query = mysql_query("SELECT * FROM $usertype WHERE password = '$password' AND username = '$username'", $conn);
		$rows = mysql_fetch_assoc($query);
		if ($rows['username'] == $username) {
			$_SESSION['login_user'] = $username; // starting session
			echo $username;
		} 
		mysql_close($conn);
		//echo json_encode($rows);
	}
	
?>
<!-- // 	session_start();
// 	$error = '';
// 	if (isset($_POST['submit'])) {
// 		if (empty($_POST['username']) || empty($_POST['password'])) {
// 			$error = "Username or Password is invalid";
// 		}
// 		else {
// 			$username = $_POST['username'];
// 			$password = $_POST['password'];
// 			$usertype = $_POST['select'];
// 			$_SESSION["username"] = $username;
// 			$_SESSION["password"] = $password;
// 			$_SESSION["select"] = $usertype;
			

// 			//connect to sql database
// 			$conn = mysql_connect("localhost", "spotsuser", "spots123");

// 			//to protect MySQL injection for Secutioty purpose
// 			$username = stripslashes($username);
// 			$password = stripslashes($password);
// 			$username = mysql_real_escape_string($username);
// 			$password = mysql_real_escape_string($password);

// 			//choose database
// 			$db = mysql_select_db("spots", $conn);

// 			//Fetch info for users
// 			$query = mysql_query("SELECT * FROM $usertype WHERE password = '$password' AND username = '$username'", $conn);

// 			$rows = mysql_num_rows($query);

// 			if ($rows == 1) {
// 				$_SESSION['login_user'] = $username; // starting session
// 				header("Location: homePage.php");
// 			} else {
// 				$error = "Username of Passoword is Invalid";
// 			}
// 			mysql_close($conn);
// 		}
// 	}
 -->