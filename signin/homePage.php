<?php
	include("login.php");
	$choice = "";
	$choice = $_SESSION['select'];


?>

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
    <script type="text/javascript" src="/SPOTS/api/functions.js"></script>


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


						
						?> </button></a></li>
						
				</ul>
			</div>
		</div>
	</div>


	<section class="child4 scroll" style=" padding-top:110px">
			<!-- Search bar -->
			<div class="map-block-container" style="height:100%">
			<div ng-app="locations" class="block-height">
				<div class="maxheight" data-ng-controller="myCtrl">
					<div class="col-md-12 search">
						<h3> Search For An Event <a data-toggle="modal" href="#event"><button class="btn btn-success">+</button></a> </h3> 
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

	<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	 	<div class="modal-dialog modal-lg">
	   		<div class="modal-content">
	     		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title" id="myModalLabel">Your Spots</h4>
		      	</div>
		      	<div class="modal-body">
		      		<div class="container">
		      			<form method = "POST" action="/SPOTS/registerEvent.php">
	                <label>Event Name: </label><input type="text" name="eventName" id="eventName" /><br/>
	                <label>Start Date: </label> <select name="startMonth" id="startMonth">
	                        <option value="01">January</option>
	                        <option value="02">February</option>
	                        <option value="03">March</option>
	                        <option value="04">April</option>
	                        <option value="05">May</option>
	                        <option value="06">June</option>
	                        <option value="07">July</option>
	                        <option value="08">August</option>
	                        <option value="09">September</option>
	                        <option value="10">October</option>
	                        <option value="11">November</option>
	                        <option value="12">December</option>
	                    </select> <select name="startDay" id="startDay">
	                        <option value="01">1</option>
	                        <option value="02">2</option>
	                        <option value="03">3</option>
	                        <option value="04">4</option>
	                        <option value="05">5</option>
	                        <option value="06">6</option>
	                        <option value="07">7</option>
	                        <option value="08">8</option>
	                        <option value="09">9</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                        <option value="24">24</option>
	                        <option value="25">25</option>
	                        <option value="26">26</option>
	                        <option value="27">27</option>
	                        <option value="28">28</option>
	                        <option value="29">29</option>
	                        <option value="30">30</option>
	                        <option value="31">31</option>
	                    </select> <select name="startYear" id="startYear">
	                        <option value="2015">2015</option>
	                        <option value="2016">2016</option>
	                        <option value="2017">2017</option>
	                        <option value="2018">2018</option>
	                        <option value="2019">2019</option>
	                        <option value="2020">2020</option>
	                        <option value="2021">2021</option>
	                        <option value="2022">2022</option>
	                        <option value="2023">2023</option>
	                        <option value="2024">2024</option>
	                        <option value="2025">2025</option>
	                        <option value="2026">2026</option>
	                        <option value="2027">2027</option>
	                    </select></br>
	                <label>End Date: </label> <select name="endMonth" id="endMonth">
	                        <option value="01">January</option>
	                        <option value="02">February</option>
	                        <option value="03">March</option>
	                        <option value="04">April</option>
	                        <option value="05">May</option>
	                        <option value="06">June</option>
	                        <option value="07">July</option>
	                        <option value="08">August</option>
	                        <option value="09">September</option>
	                        <option value="10">October</option>
	                        <option value="11">November</option>
	                        <option value="12">December</option>
	                    </select> <select name="endDay" id="endDay">
	                        <option value="01">1</option>
	                        <option value="02">2</option>
	                        <option value="03">3</option>
	                        <option value="04">4</option>
	                        <option value="05">5</option>
	                        <option value="06">6</option>
	                        <option value="07">7</option>
	                        <option value="08">8</option>
	                        <option value="09">9</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                        <option value="24">24</option>
	                        <option value="25">25</option>
	                        <option value="26">26</option>
	                        <option value="27">27</option>
	                        <option value="28">28</option>
	                        <option value="29">29</option>
	                        <option value="30">30</option>
	                        <option value="31">31</option>
	                    </select> <select name="endYear" id="endYear">
	                        <option value="2015">2015</option>
	                        <option value="2016">2016</option>
	                        <option value="2017">2017</option>
	                        <option value="2018">2018</option>
	                        <option value="2019">2019</option>
	                        <option value="2020">2020</option>
	                        <option value="2021">2021</option>
	                        <option value="2022">2022</option>
	                        <option value="2023">2023</option>
	                        <option value="2024">2024</option>
	                        <option value="2025">2025</option>
	                        <option value="2026">2026</option>
	                        <option value="2027">2027</option>
	                    </select></br>
	                <label>Category: </label><select name="category" id="category">
	                        <option value="Football">Football</option>
	                        <option value="Basketball">Basketball</option>
	                        <option value="Lacrosse">Lacrosse</option>
	                        <option value="Soccer">Soccer</option>
	                        <option value="Volleyball">Volleyball</option>
	                        <option value="Track & Field">Track & Field</option>
	                        <option value="Lecture">Lecture</option>
	                        <option value="Dance">Dance</option>
	                        <option value="Music">Music</option>
	                        <option value="Seminar">Seminar</option>
	                        <option value="Church">Church</option>
	                        <option value="Frat Party">Frat Party</option>
	                        <option value="Other">Other</option>
	                    </select></br>
	                <label>Enter Address:</label></br>
	                <span style="padding: 0 20px">&nbsp;</span><label>Street: </label><input type="text" name="address" id="address"/><br/>
	                <span style="padding: 0 20px">&nbsp;</span><label>City:</label> <input type="text" name="city" id="city"/><br/>
	                <span style="padding: 0 20px">&nbsp;</span><label>State: </label><select name="state" id="state">
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
	                <span style="padding: 0 20px">&nbsp;</span><label>ZipCode: </label><input type="text" name="zipcode" id="zipcode"/></br>
	                <br><br><br><br><br><br>
	                    <label></label><input name="submit" onclick="if (confirm('Register Event?')) { alert('Event is registered'); return true; } else {  return false; }" type="submit" class="btn btn-success" value=" Submit " align="centered" >
	                    <!-- <span><br/><br/><br/><?php echo $error; ?></span></div> -->
        			</form>
		      		</div>
		      	</div>
		   		<div class="modal-footer">
		   		<form action="/SPOTS/signin/logout.php" class="inline"><button class="btn btn-success"  style="outline:none"> 
						<i class="fa fa-1x fa-street-view"> </i>Log Out </button>
				</form>
			    </div>
		    </div>
		</div>
	</div>



		<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	 	<div class="modal-dialog modal-lg">
	   		<div class="modal-content">
	     		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title" id="myModalLabel">Your Spots</h4>
		      	</div>
		      	<div class="modal-body">
		      		<div class="container">
		      		

		      		
		      			<?php 
			      			if ($choice =='Driver') {
								$car = $_SESSION['car'];
		      					echo "$car";
								$currentSpots = $_SESSION['parked'];
								if ($currentSpots == "None") {
									echo "<h2>Currently Not Parked Anywhere</h2>";
								} else {
									?> 
								<div style="text-align:center;verticle-align:bottom">
									<h2><b><u>Spots You Have Reserved: </u></b></h2> 
								</div>
									
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
									    	if (address[i] != undefined) {
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
									    }
									    document.write('</table>')
									} else {
										document.write('</table>')
										document.write('<div align="center"><h2>NO RESULTS</h2></div>')
									}

								    
								}());
								</script>
								<div style="text-align:center;verticle-align:bottom"> <br>
										<button onclick="return confirm('You sure you want to cancel your reservation?');" data-toggle="modal" data-target="#myModal" class=" btn btn-success" style="outline:none; margin-bottom: 10px"> 
														<i class="fa fa-1x fa-car"></i> Cancel </button>
													</div> </form> 	

						<div style="text-align:center;verticle-align:bottom">
							<h2><b><u>Select Vehicle to Park </u></b></h2> 
	
								<form method = "post" action="Driver/changeCar.php">
									
									<div class="col-sm-8" style="padding-left:260px">
									<select name="chooseCar" id="selectCar" class="form-control" style="text-align:center">
												
									</select>
								</div>

									<?php include("Driver/changeCar.php"); 
									?>
									<script>
										(function () {
											
										    var elm = document.getElementById('selectCar'),
										        df = document.createDocumentFragment();
										    var license = <?php echo json_encode($licensePlate); ?>;
										    var count = <?php echo json_encode($count); ?>;
										    var car = <?php echo json_encode($carModel); ?>;
										    for (var i = 0; i < count; i++) {
										        var option = document.createElement('option');
										        option.value = license[i];  //the value that is sent in the post
										        option.appendChild(document.createTextNode(license[i] + " " + car[i]));  //what the select option is
										        df.appendChild(option);
										    }
										    elm.appendChild(df);
										}());
									</script>
										
									<br><br>
									<button data-toggle="modal" data-target="#myModal" class=" btn btn-success" style="outline:none; margin-bottom: 10px"> 
													<i class="fa fa-1x fa-car"></i> Select Car</button><br>

									</form></div>
								
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

		   		</div></div>
		   		<div class="modal-footer">
		   		<form action="/SPOTS/signin/logout.php" class="inline"><button class="btn btn-success"  style="outline:none"> 
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
    <script src="/SPOTS/js/jquery.php"></script>

    <script type="text/javascript" src="/SPOTS/api/functions.js"></script>

    

	

    
</body>

</html>