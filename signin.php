<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Spots Homeowner Page</title>

	<!~~ Bootstrap CSS ~~>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <!~~ Font Awesome ~~>
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!~~ Google Fonts ~~>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    <!~~ TipueDrop CSS ~~>
    <link href="css/tipuedrop.css" rel="stylesheet">
    <!~~ Leaflet CSS ~~>
    <link rel="stylesheet" href="css/leaflet.css"
    <!~~ Custom CSS ~~>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
	<!~~ Fixed Top Navbar ~~>
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a href="index.html">
					<img alt="" src="img/spotslogo2.png" class="img-brand"></img>
				</a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="navbar-left">
				
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li> <button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none"> 
						<i class="fa fa-1x fa-car"></i> My Spots </button></li>
					<li> <form action="/SPOTS/loginPage.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						<i class="fa fa-1x fa-street-view"> </i>Register </button></form></li>
					<li> <form action="/SPOTS/aboutMe.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						<i class="fa fa-1x fa-car"> </i>About SPOTS </button></form></li>
				</ul>
			</div>
		</div>
	</div>
 -->
<!-- 





<html>
<head><title>Sign In</title></head>
<body>

<h3> Sign In </h3>
<form method = "post" action = "/SPOTS/signin.php">
	Username: <input type = "text" name = "username" /><br />
	Password: <input type = "text" name = "password" /><br />
	<input type = "submit" name = "submit" value = "submit form"/>
	</form>

	
 

 <form method="post" action="/SPOTS/index.html">
 		<input type="submit" value="HOME PAGE">
 	</form>
 	
 	<?php
 		if(isset($_POST['username'])) {
 			$username = $_POST['username'];
 			$password = $_POST['password'];
 			echo "Your username is $username";
 			echo "Your password is $password";
 			}


			$databaseUsername = "spotsuser";
			$databasePassword = "spots123";
			$database = "spots";

			global $conn;
			$conn = mysql_connect($servername, $databaseUsername, $databasePassword);

			// Check connection
			if (!$conn) 
			{
				//if the connection fails then we kill the whole thing
    			die("Connection failed: " . mysql_error());
			} 
			else 
			{
				echo "database successfully connected";
			}

			mysql_select_db($database);

//			$insert = "INSERT INTO Driver (username, fname, lname, email, password, street, city, state, zip, carModel, licensePlate) VALUES ('$username', '$fname', '$lname', '$email', '$password', '$address', '$city', '$state', $zipcode, '$carModel', '$licensePlate')";
	
			$selectUsername = "SELECT username FROM Driver WHERE username = '$username'";
			$selectPassword = "SELECT password FROM Driver WHERE password = '$password'";
			echo "YO - $selectUsername";
			
			if(mysql_query($selectUsername) == '$username')
			{
				echo "Hey - $username";
			} 
			else
			{
				echo "Error";
			}
			if(mysql_query($selectPassword) == '$password')
			{
				echo "You - $password";
			} 
			else
			{
				echo "Error";
			}
							

?>
 

	
</form>
</body>
</html>
 -->