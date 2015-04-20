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
	<div class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a class="navbar-brand" href="index.html"> Spots
				</a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="navbar-left">
				
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="navStyle">
						<a href="#about"><i class="fa fa-1x fa-car"></i> About </button></a></li>
					<li class="navStyle"> 
						<a href="/SPOTS/registerPage.php" ><i class="fa fa-1x fa-street-view"> </i>Register </a></li>
					
					<li class="navStyle"> 
						<a href="/SPOTS/signin/signIn.php" ><i class="fa fa-1x fa-street-view"> </i>Log In </li>
				</ul>
			</div>
		</div>
	</div>


	<!-- Main Body -->
	<section>
	<div class="col-md-12 col-body">
		<div class="parent">
			<div class="vert-center col-md-8">
				<h2 style="text-align:center"> Register for <img alt="" src="img/spotslogo2.png" style="width:250px; padding-top:7px"></img> </h2>
			</div>

			<!-- Content -->
			<div class="vert-center col-md-2">
					<h3>Please select who you would like to register as:</h3>
						<form method="post" action="drivePage.php"><button class="dlink btn btn-lg btn-info"  style="outline:none">Driver</button></form>
						<br>
						<form method="post" action="homeownerPage.php"><button class="dlink btn btn-lg btn-info"  style="outline:none">Homeowner</button></form>
			</div>
		</div>

	</div>

		<div class="footer">
			<h4>Brought to you by HackStreet Boys INC. <br>
				<i>WE CODE, SO YOU DONT HAVE TO <i></h4> 	
		</div>
	</section>


	<!-- jQuery -->
    <script src="js/jquery.js"></script>

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