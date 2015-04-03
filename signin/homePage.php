
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
                <a href="homePage.php">
					<img alt="" src="/SPOTS/img/spotslogo2.png" class="img-brand"></img>
				</a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="navbar-left">
				
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li> <button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none"> 
						<i class="fa fa-1x fa-car"></i> About SPOTS </button></li>
					
					<li> <form action="/SPOTS/signin/logout.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						<i class="fa fa-1x fa-street-view"> </i>Log Out </button></form></li>
				</ul>
			</div>
		</div>
	</div>



	<!-- Main Body -->
	<section>
	<div class="col-md-10 col-md-offset-1 col-body">
		<div class="container">
			<div class="centered">
				<h1> Welcome to <img alt="" src="/SPOTS/img/spotslogo2.png" style="width:250px; padding-top:7px"></img> </h1>
			</div>

			<!-- Search Bar -->
			<div style="margin-top:-20px">
				<div class="col-md-4 search">
					<form action="/SPOTS/registerEvent.php" class="inline"><h3> Search For An Event <button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						+</button></form> </h3> 
					<form>
						
	      					<input type="text" class="form-control" placeholder="Search for..." name="q" autocomplete="off"id="tipue_drop_input" required>
	      					
	      				
	      			</form>
	      			<br/><div id="tipue_drop_content"></div>
				</div>

				<!-- Map -->
				<div class="col-md-8">
					<div id="map" class="map"></div>
				</div>
			</div>

		</div>
	</div>
	</section>



		<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	 	<div class="modal-dialog modal-lg">
	   		<div class="modal-content">
	     		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title" id="myModalLabel">About Spots</h4>
		      	</div>
		      	<div class="modal-body">
		      		<h4>Have you ever attended an event (football game, concert, festival) and tried to avoid high parking prices by parking in residential or commercial lots for sale near the event location? If this is you, then Spots is the app you need to pursue. <br><br> Spots is a web and mobile app that will help you to find a parking spot
					at any event in your area.  Spots does this through the help of you, the user.
					As the user of this app, you can register as both a homeowner and a driver.
					As a homeowner, you indicate how many spots you have available in your lot.
					This information is readily available to users if they search for an event in
					your area.  As a driver, you register your car and you can reserves spots at a
					lot before the game as well as pull up the app on game day to find which homes have parking spaces available.<br><br>

					</h4>
		   		</div>
			    <div class="modal-footer">
			       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    </div>
		    </div>
		</div>
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