<?php 
	function get_lonlat(  $addr  ) {
	    try {
	            $coordinates = @file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($addr) . '&sensor=true');
	            $e=json_decode($coordinates);
	            // call to google api failed so has ZERO_RESULTS -- i.e. rubbish address...
<<<<<<< HEAD
	            if ( isset($e->status)) { if ( $e->status == 'ZERO_RESULTS' ) {echo '1:'; $err_res=true; } else {echo '2:'; $err_res=false; } } else { echo '3:'; $err_res=false; }
=======
	            if ( isset($e->status)) { if ( $e->status == 'ZERO_RESULTS' ) { $err_res=true; } else { $err_res=false; } } else {  $err_res=false; }
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
	            // $coordinates is false if file_get_contents has failed so create a blank array with Longitude/Latitude.
	            if ( $coordinates == false   ||  $err_res ==  true  ) {
	                $a = array( 'lat'=>0,'lng'=>0);
	                $coordinates  = new stdClass();
	                foreach (  $a  as $key => $value)
	                {
	                    $coordinates->$key = $value;
	                }
	            } else {
	                // call to google ok so just return longitude/latitude.
	                $coordinates = $e;

	                $coordinates  =  $coordinates->results[0]->geometry->location;
	            }

	            return $coordinates;
	    }
	    catch (Exception $e) {
	    }
	}


	//connect to sql database
	$conn = mysql_connect("localhost", "spotsuser", "spots123");

	//choose database
	$db = mysql_select_db("spots", $conn);

	$table = "SELECT * from Events";
	$result = mysql_query($table, $conn);

<<<<<<< HEAD
	echo "TEST<br>";
=======
	//echo "TEST<br>";
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a

	$events = array();
	if (mysql_num_rows($result) > 0) {
		while($row = mysql_fetch_assoc($result)) {
			$eventName = $row['eventname'];
			$startDate = $row['startDate'];
			$endDate = $row['endDate'];
			$category = $row['category'];
			$address = $row['address'];
			$city = $row['city'];
			$state = $row['state'];
			$event['title'] = $eventName;
			$event['thumb'] = "img&#47drop.png";
			$event['text'] = "a SPOTS suggested event";
		 	$event['tags'] = $category;
		 	$fullAddress = "$address" . ", " . "$city" . ", " . "$state";
		 	$longLat = get_lonlat($fullAddress);
		 	unset($event['loc']);
		 	$event['loc'][] = $longLat->lat; 
		 	$event['loc'][] = $longLat->lng;
			$events[] = $event;
		}
	} else {
<<<<<<< HEAD
		echo "<h4>No results</h4>";
=======
		//echo "<h4>No results</h4>";
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
	}
	
	foreach ($events as $i => $value) {
		$value = $events[$i];
<<<<<<< HEAD
		echo  json_encode($value);
		echo "<br>";
=======
		//echo  json_encode($value);
		//echo "<br>";
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
	
	}

	$homeQuery = "SELECT * from Home natural join Homeowner";
	$homeResult = mysql_query($homeQuery, $conn);

<<<<<<< HEAD
	echo "<br> HOMES <br>";
=======
	//echo "<br> HOMES <br>";
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a

	$homes = array();
	if (mysql_num_rows($homeResult) > 0) {
		while ($row = mysql_fetch_assoc($homeResult)) {
			$address = $row['address']; 
			$city = $row['city'];
			$state = $row['state'];
			$homeownerName = $row['username'];
<<<<<<< HEAD
=======
			$homeId = $row['homeId'];
			$spotsAvailableQuery = mysql_query("SELECT count(spotId), price from Spots where homeId = $homeId and taken = false", $conn);
			$row2 = mysql_fetch_assoc($spotsAvailableQuery);
			$spotsAvailable = $row2['count(spotId)'];
			$price = $row2['price'];
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
			$homeownerPhone = $row['phone'];
			$homeownerEmail = $row['email'];
			$homeownerContact = "Phone number: " . $homeownerPhone . " Email: " . $homeownerEmail;
			$fullAddress = "$address" . ", " . "$city" . ", " . "$state";
			$homeLonLat = get_lonlat($fullAddress);
<<<<<<< HEAD
			$home['title'] = "House parking by: " . $homeownerName;
=======
			$home['title'] = "Parking By: " . $homeownerName . "<br>Spots Available: " . $spotsAvailable . "<br>Price: $" . $price;
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
			$home['thumb'] = 'img&#47drop.png';
			$home['text'] = "$homeownerContact";
		 	$home['tags'] = "Parking";
		 	unset($home['loc']);
		 	$home['loc'][] = $homeLonLat->lat; 
		 	$home['loc'][] = $homeLonLat->lng;
<<<<<<< HEAD
=======
		 	$home['homeId'] = $homeId;
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
		 	$homes[] = $home;
		}
		
	} else {
<<<<<<< HEAD
			echo "<h4> NO RESULTS </h4>";
=======
			//echo "<h4> NO RESULTS </h4>";
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a
	}

	foreach ($homes as $i => $value) {
		$value = $homes[$i];
<<<<<<< HEAD
		echo  json_encode($value);
		echo "<br>";
	}


	//echo json_encode($events);
=======
		//echo  json_encode($value);
		//echo "<br>";
	}


	
>>>>>>> 1338c8b6e8dc895f13ab873372ba269657bde08a

	
	
	mysql_close($conn);
	
?>