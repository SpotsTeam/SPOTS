<?php
	include("login.php");
	$choice = "";
	$choice = $_SESSION['select'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<script type = "text/javascript" src = "/SPOTS/jshelper/relay.js"> </script>
    <script type = "text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
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
					<?php if ($choice == "Homeowner") { ?>
					<li> <form action="/SPOTS/signin/Homeowner/manageSpots.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
                        <i class="fa fa-1x fa-street-view"> </i>Manage Spots </button></form></li>
                    <?php } ?>
					<li> <button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none"> 
						<i class="fa fa-1x fa-car"></i> 
						<?php
						if ($choice === "Driver") {
							include("Driver/yourCar.php"); 
							$user = $_SESSION['username'];
							echo "$user";
						} else {
							include("home.php");
							$user = $_SESSION['username'];
							$name = $_SESSION['name'];
							echo "$user";
						}
						
						?> </button></li>
				</ul>
			</div>
		</div>
	</div>



	<!-- Main Body -->
	<section>
	<div class="col-md-10 col-md-offset-1 col-body">
		<div class="container">
			<div class="centered">
				<h1> <?php 
					if ($choice == "Driver") {
						echo "Driver";
					} else {
						echo "Homeowner";
					}

				?> <img alt="" src="/SPOTS/img/spotslogo2.png" style="width:250px; padding-top:7px"></img> </h1>
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
	        		<h4 class="modal-title" id="myModalLabel">Your Spots</h4>
		      	</div>
		      	<div class="modal-body">
		      		<h2>
		      			<?php 
			      			if ($choice =='Driver') {
								$car = $_SESSION['car'];
		      					echo "$car";
		      					?> 
		      					<form action="/SPOTS/signin/Driver/editInfo.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
									<i class="fa fa-1x fa-street-view"> </i>Edit Driver Information </button>
								</form>

		      			<?php
							} else {
								$name = $_SESSION['name'];
								$home = $_SESSION['home'];
								echo "$name";
								echo "<h2>Current address: $home </h2>";
								include("Homeowner/yourHome.php");
								$spotsA = $_SESSION['spotsAvailable'];
								$spotsT = $_SESSION['spotsTaken'];
								echo "$spotsA";
								echo "$spotsT";
							}
		      				
		      				
		      			?>

					</h2>
		   		</div>
		   		<div class="modal-footer">
		   		<form action="/SPOTS/signin/logout.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						<i class="fa fa-1x fa-street-view"> </i>Log Out </button>
				</form>
			       
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