
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Spots - Find Parking Near Events! </title>

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="css/leaflet.css"
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
	<!-- Static Top Navbar -->
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a class="navbar-brand" href="#top"> <img class="logo" src="img/spotslogo2.png"/>
				</a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#about">About </button></a>
					</li>
					<li> 
						<a href="#map-scroll">Map</a>
					</li>
					<li> 
						<a href="signin/signIn.php">Log In</a>
					</li>
					
					
					<li>
						 <a href="loginPage.php"><div class="login-button">Register</div></a>
					</li>
				</ul>
			</div>
		</div>
	</div>


	<!-- Main Body -->
	<section id="top" class="col-md-12 col-body">
			<div class="vert-center col-md-8">
				<h1>Please Sign Up as Driver</h1>
			</div>

			<div class="vert-center col-md-2">
				<form method = "post" action="driverDisplay.php">
					<label>Username:</label> <input type="text" name="username"/><br/>
					<label>Password:</label> <input type="text" name="password" /><br/>
					<label>First Name:</label> <input type="text" name="fname" /><br/>
					<label>Last Name:</label> <input type="text" name="lname" /><br/>
					<label>Email:</label> <input type="text" name="email" /><br/>
					<label>Enter Address:</label></br>
					<span style="padding: 0 20px">&nbsp;</span><label>Street:</label> <input type="text" name="address" /><br/>
					<span style="padding: 0 20px">&nbsp;</span><label>City:</label> <input type="text" name="city" /><br/>
					<span style="padding: 0 20px">&nbsp;</span><label>State:</label> <select name="state"> 
									<option value="AL">AL</option>
									<option value="AK">AK</option>
									<option value="AZ">AZ</option>
									<option value="AR">AR</option>
									<option value="CA">CA</option>
									<option value="CO">CO</option>
									<option value="CT">CT</option>
									<option value="DE">DE</option>
									<option value="FL">FL</option>
									<option value="GA">GA</option>
									<option value="HI">HI</option>
									<option value="ID">ID</option>
									<option value="IL">IL</option>
									<option value="IN">IN</option>
									<option value="IA">IA</option>
									<option value="KA">KS</option>
									<option value="KY">KY</option>
									<option value="LA">LA</option>
									<option value="ME">ME</option>
									<option value="MD">MD</option>
									<option value="MA">MA</option>
									<option value="MI">MI</option>
									<option value="MN">MN</option>
									<option value="MS">MS</option>
									<option value="MO">MO</option>
									<option value="MT">MT</option>
									<option value="NE">NE</option>
									<option value="NV">NV</option>
									<option value="NH">NH</option>
									<option value="NJ">NJ</option>
									<option value="NM">NM</option>
									<option value="NY">NY</option>
									<option value="NC">NC</option>
									<option value="ND">ND</option>
									<option value="OH">OH</option>
									<option value="OK">OK</option>
									<option value="OR">OR</option>
									<option value="PA">PA</option>
									<option value="RI">RI</option>
									<option value="SC">SC</option>
									<option value="SD">SD</option>
									<option value="TN">TN</option>
									<option value="TX">TX</option>
									<option value="UT">UT</option>
									<option value="VT">VT</option>
									<option value="VA">VA</option>
									<option value="WA">WA</option>
									<option value="WV">WV</option>
									<option value="WI">WI</option>
									<option value="WY">WY</option>
									<option value="DC">DC</option>
								</select></br>
					<span style="padding: 0 20px">&nbsp;</span><label>ZipCode:</label> <input type="text" name="zipcode" /></br>
					<span style="padding: 0 20px">&nbsp;</span><label>Car Make:</label> <input type="text" name="carMake" /></br>
					<span style="padding: 0 20px">&nbsp;</span><label>Car Model:</label> <input type="text" name="carModel" /></br>
					<span style="padding: 0 20px">&nbsp;</span><label>LicensePlate:</label> <input type="text" name="licensePlate" /></br>
					<span style="padding: 0 20px">&nbsp;</span><label>Phone Number:</label> <input type="text" name="phone" /></br>
					<br><br><br><br><br><br><br><br>
					<button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none; margin-left: 150px"> 
									<i class="fa fa-1x fa-car"></i> Submit </button>
				</form>
			</div>
	</section>

		<!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.easing.min.js"></script>

	<!-- Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Leaflet Maps -->
    <script src="js/leaflet.js"> </script>
    <script src="js/maps.js"> </script>

    <!-- Custom JavaScript -->
    <script src="js/jscript.js"></script>

</body>

</html>
