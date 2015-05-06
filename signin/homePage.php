<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2
<?php
	include("login.php");
	$choice = "";
	$choice = $_SESSION['select'];


?>
<<<<<<< HEAD
=======

>>>>>>> 1bd8214d859cf8df5e9dc5a7e881ae151ee67b1f
=======

>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2
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
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="/SPOTS/css/leaflet.css"
    <!-- Custom CSS -->
    <link href="/SPOTS/css/styles.css" rel="stylesheet">
    <!-- VENMO STUFF -->
    <script src='https://platform.venmo.com/sdk.js'></script>

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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2
					<?php if ($choice == "Homeowner") { ?>
					<li> 
						<a href="/SPOTS/signin/Homeowner/manageSpots.php">Manage Spots </button></a>
					</li>
					
                    <?php } else { ?>
                    <li> 
						<a href="Driver/listView.php">Find a Spot </button></a>
					</li> 
					<li> 
						<a href="Driver/editInfo.html">Edit Info </button></a>
					</li>

					<?php } ?>

					<li> <a data-toggle="modal" href="#myModal">


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
<<<<<<< HEAD
=======
					<li> <button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none"> 
						<i class="fa fa-1x fa-car"></i> 
						<?php
							include("yourCar.php"); 
							$user = $_SESSION['username'];
							echo "$user";
>>>>>>> 1bd8214d859cf8df5e9dc5a7e881ae151ee67b1f
=======


						
						?> </button></a></li>
>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2
						
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2
				<h1> <?php 
					if ($choice == "Driver") {
						echo "Driver";
					} else {
						echo "Homeowner";
					}

				?> <img alt="" src="/SPOTS/img/spotslogo2.png" style="width:250px; padding-top:7px"></img> </h1>
<<<<<<< HEAD
=======
				<h1> Welcome to <img alt="" src="/SPOTS/img/spotslogo2.png" style="width:250px; padding-top:7px"></img> </h1>
>>>>>>> 1bd8214d859cf8df5e9dc5a7e881ae151ee67b1f
=======

>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2
			</div>
		</div>
		</div>
	</div>


			<div class="child4 scroll">
			<br><br><br><br><br><br><br><br><br><br>
			<!-- Search bar -->
			<div class="map-block-container">
			<div ng-app="locations" class="block-height">
				<div class="maxheight" data-ng-controller="myCtrl">
					<div class="col-md-12 search">
						<h3> Search For An Event <a href="../registerEvent.html"><button>+</button></a> </h3>
						<input class="form-control" type="search" ng-model="q" placeholder="Find an event..." />
		      			<div class="result-container">
			      			<ul>
			      				<li ng-animate="'animate'" ng-repeat="event in locations | filter:q as results">
			      					<div class="listStyle" ng-click="changeMap(event.loc)">
			      					<div class="event-title"> {{event.title}}</div>
			      					<div class="event-text">{{event.text}}</div>
			      					</div>
			      				</li>
			      			</ul>
			      		</div>
					</div>
				</div>
			</div>
			
				<!-- Map -->
				<div id="map" class="map">			
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2
		      		<h2>
		      			<?php 
			      			if ($choice =='Driver') {
								$car = $_SESSION['car'];
		      					echo "$car";
								$currentSpots = $_SESSION['parked'];
								if ($park == "dfj") {
									echo "<h2>Currently Not Parked Anywhere</h2>";
								} else {
									echo "<h2><b>Spots You Reserved: </b></h2>";
									?> 
									<form enctype="multipart/form-data"method = "post" action="Driver/cancelReservation.php">
									<script>
								(function () {
									
								    
								    document.write('<table style="width:80%" border="2" cellspacing="100" cellpadding="10" align="center">')
								    document.write('<tr>')
								    document.write('<th>Address</th>')
								    document.write('<th>City</th>')
								    document.write('<th>State</th>')
								    document.write('<th>Price</th>')
								    document.write('<th>Phone Number</th>')
								    document.write('<th>Email</th>')
								    document.write('<th>Cancel Reservation</th>')
									document.write('</tr>')
									var address = <?php echo json_encode($addressArr)?>;
									var city = <?php echo json_encode($cityArr)?>;
									var state = <?php echo json_encode($stateArr)?>;
									var price = <?php echo json_encode($priceArr)?>;
									var phone = <?php echo json_encode($phoneArr)?>;
									var email = <?php echo json_encode($emailArr)?>;
									var count = <?php echo json_encode($count)?>;
									var spotId = <?php echo json_encode($spotIdArr)?>;
									var homeId = <?php echo json_encode($homeIdArr)?>;
									if (count > 0) {
									    for (var i = 0; i < count; i++) {
									    	document.write('<tr>')
										   	document.write('<td>'+ address[i]+'</td>')
											document.write('<td>' + city[i] + '</td>')
									        document.write('<td>' + state[i] + '</td>')
									        document.write('<td>$' + price[i] + '</td>')
											document.write('<td>' + phone[i] + '</td>')
									        document.write('<td>' + email[i] + '</td>') 
									        var tempArr = [spotId[i], homeId[i]];
				        					var arr = [];
				       						arr[i] = tempArr;
									        document.write('<td><input type="radio" name="cancel" value="'+ arr[i]+'">Cancel</td>')
								     	    document.write('</tr>')
									    }
									    document.write('</table>')
									} else {
										document.write('</table>')
										document.write('<div align="center"><h2>NO RESULTS</h2></div>')
									}
								    
								}());
								</script>
								<div style="text-align:center;verticle-align:bottom">
										<button onclick="return confirm('You sure you want to cancel your reservation?');" data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none; margin-bottom: 10px"> 
														<i class="fa fa-1x fa-car"></i> Cancel </button>
													</div> </form> 									
							<?php
								}

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
<<<<<<< HEAD
=======
		      		<h4>
		      			<?php 
		      				
		      				$car = $_SESSION['car'];
		      				echo "$car";
		      			?>

					</h4>
>>>>>>> 1bd8214d859cf8df5e9dc5a7e881ae151ee67b1f
=======

>>>>>>> d0bcf384cc69d14ea4b2a026d40bc1cd0c663fa2
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
    <script src="/SPOTS/js/jquery.easing.min.js"></script>

    <!-- Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

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
    <?php if ($choice == 'Driver') {  ?>
    	<script src="/SPOTS/js/maps.php"> </script>
    <?php } else { ?>
        <script src="/SPOTS/js/homeownerMap.php"> </script>
    <?php } ?>
    <!-- Custom JavaScript -->
    <script src="/SPOTS/js/jscript.js"></script>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    

	

    
</body>

</html>