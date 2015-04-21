

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Spots - Find Parking Near Events! </title>

	<!-- Bootstrap CSS -->
	<link href="/SPOTS/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/SPOTS/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    <!-- TipueDrop CSS -->
    <link href="/SPOTS/css/tipuedrop.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="/SPOTS/css/leaflet.css"
    <!-- Custom CSS -->
    <link href="/SPOTS/css/styles.css" rel="stylesheet">

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
                <a href="../homePage.php">
					<img alt="" src="/SPOTS/img/spotslogo2.png" class="img-brand"></img>
				</a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="navbar-left">
				
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="../homePage.php"> Back </a>
					</li>
				</ul>
			</div>
		</div>
	</div>


	<br><br><br>
	<!-- Main Body -->
	<section>
	<div class="col-md-10 col-md-offset-1 col-body">
		<div class="container">
			<div class="centered">
				<h1> <img alt="" src="/SPOTS/img/spotslogo2.png" style="width:250px; padding-top:7px"></img> </h1>

			</div>


			
		</div>
	</div>
	</section>
	<?php include("selectSpots.php");?>
	<form method = "post" action="registerSpot.php">

		<script>
			(function () {
				
			    
			    document.write('<table border="2" cellspacing="100" cellpadding="100" align="center">')
			    document.write('<tr>')
			    document.write('<th>Spot Number</th>')
			    document.write('<th>Price</th>')
			    document.write('<th>Address</th>')
			    document.write('<th>City</th>')
			    document.write('<th>State</th>')
			    document.write('<th>Zipcode</th>')
			    document.write('<th>Reserve</th>')
				document.write('</tr>')
				var spotId = <?php echo json_encode($spotId)?>;
				var price = <?php echo json_encode($price)?>;
				var address = <?php echo json_encode($address)?>;
				var city = <?php echo json_encode($city)?>;
				var state = <?php echo json_encode($state)?>;
				var zipcode = <?php echo json_encode($zipcode)?>;
				var count = <?php echo json_encode($count)?>;

			    for (var i = 0; i < count; i++) {
			    	document.write('<tr>')
				   	document.write('<td>'+ spotId[i]+'</td>')
					document.write('<td>' + price[i] + '</td>')
			        document.write('<td>' + address[i] + '</td>')
			        document.write('<td>' + city[i] + '</td>')
					document.write('<td>' + state[i] + '</td>')
			        document.write('<td>' + zipcode[i] + '</td>')
			        document.write('<td><input type="radio" name="spot" value="'+ spotId[i]+'"></td>')
		     	    document.write('</tr>')
			    }
			}());
		</script>
			
		
		<button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none; margin-left: 500px"> 
						<i class="fa fa-1x fa-car"></i> Select </button>
	</div>



	<!-- jQuery -->
    <script src="/SPOTS/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/SPOTS/js/bootstrap.min.js"></script>

    <!-- TipueDrop JavaScript -->
    <script src="/SPOTS/js/tipuedrop.js"></script>
    <script src="/SPOTS/js/tipuedrop_content.js"></script>
    <script>
		$(document).ready(function() {
		     $('#tipue_drop_input').tipuedrop();
		});
	</script>

    <!-- Leaflet Maps JavaScript -->
    <script src="/SPOTS/js/leaflet.js"> </script>
    <script src="/SPOTS/js/maps.js"> </script>

    <!-- Custom JavaScript -->
    <script src="/SPOTS/js/jscript.js"></script>

</body>

</html>