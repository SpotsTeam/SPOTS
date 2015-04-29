

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
	<?php include("selectSpots.php"); ?>	
	<form method="post" action="Driver/registerSpot.php">
	<span style="padding: 0 20px">&nbsp;</span><label>Enter a City to Search:</label><input type="Search" name="city"></input>
	<span style="padding: 0 20px">&nbsp;</span><label>Order By: </label> <select name="groupBy"> 
						<option value="spotNumber">spotId</option>
						<option value="price">Price</option>
						<option value="address">Address</option>
						<option value="city">City</option>
						<option value="state">State</option>
						<option value="zipcode">Zipcode</option>
		</select>
		<button style="outline:bold; margin-left: 60px">Search</button><br><br><br>
	</form>
	<form enctype="multipart/form-data"method = "post" action="registerSpot.php">
		<script>
			(function () {
				
			    
			    document.write('<table style="width:80%" border="2" cellspacing="100" cellpadding="10" align="center">')
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
				var homeId = <?php echo json_encode($homeId)?>;
				var count = <?php echo json_encode($count)?>;
				if (count > 0) {
				    for (var i = 0; i < count; i++) {
				    	document.write('<tr>')
					   	document.write('<td>'+ spotId[i]+'</td>')
						document.write('<td> $' + price[i] + '</td>')
				        document.write('<td>' + address[i] + '</td>')
				        document.write('<td>' + city[i] + '</td>')
						document.write('<td>' + state[i] + '</td>')
				        document.write('<td>' + zipcode[i] + '</td>') 
				        var tempArr = [spotId[i], homeId[i]];
				        var arr = [];
				        arr[i] = tempArr;
				        document.write('<td><input type="radio" name="spot" value="'+ arr[i]+'"></td>')
			     	    document.write('</tr>')
				    }
				    document.write('</table>')
				} else {
					document.write('</table>')
					document.write('<div align="center"><h2>NO RESULTS</h2></div>')
				}
		
			}());
		</script>
		
		<br><br>
		<div style="text-align:center;verticle-align:bottom">
		<button onclick="return confirm('Reserve this spot?');" data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none; margin-bottom: 10px"> 
						<i class="fa fa-1x fa-car"></i> Reserve </button>
						
					</div> </form> 
		<br><br><br><br>



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