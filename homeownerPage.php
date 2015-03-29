<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Spots Homeowner Page</title>

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    <!-- TipueDrop CSS -->
    <link href="css/tipuedrop.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="css/leaflet.css"
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
	<!-- Fixed Top Navbar -->
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
					<li> <form action="loginPage.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						<i class="fa fa-1x fa-street-view"> </i>Register </button></form></li>
					<li> <form action="aboutMe.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						<i class="fa fa-1x fa-car"> </i>About SPOTS </button></form></li>
					
					<li> <form action="/SPOTS/loginPage.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						<i class="fa fa-1x fa-street-view"> </i>Back </button></form></li>
					
				</ul>
			</div>
		</div>
	</div>


	<!-- Main Body -->	

	<div style="margin-top:80px" class="centered">
	<h2>Please Sign Up as Homeowner</h2>
	
	<form method = "post" action="homeownerDisplay.php">
		<label>Username:</label> <input type="text" name="username" /><br/>
		<label>Password:</label> <input type="text" name="password" /><br/>
		<label>First Name:</label> <input type="text" name="fname" /><br/>
		<label>Last Name:</label> <input type="text" name="lname" /><br/>
		<label>Email:</label> <input type="email" name="email" /><br/>
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
		<label>Number of Parking Spots Available: </label> <input type="text" name="spots" /><br/>
		<br><br><br><br><br><br>
		<button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none; margin-left: 150px"> 
						<i class="fa fa-1x fa-car"></i> Submit </button>
	</div>
</body>

<html>
