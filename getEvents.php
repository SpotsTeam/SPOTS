<?php 
	function get_lonlat(  $addr  ) {
	    try {
	            $coordinates = @file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($addr) . '&sensor=true');
	            $e=json_decode($coordinates);
	            // call to google api failed so has ZERO_RESULTS -- i.e. rubbish address...
	            if ( isset($e->status)) { if ( $e->status == 'ZERO_RESULTS' ) { $err_res=true; } else { $err_res=false; } } else {  $err_res=false; }
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

	//echo "TEST<br>";

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
		//echo "<h4>No results</h4>";
	}
	
	foreach ($events as $i => $value) {
		$value = $events[$i];
		//echo  json_encode($value);
		//echo "<br>";
	
	}

	$homeQuery = "SELECT * from Home natural join Homeowner";
	$homeResult = mysql_query($homeQuery, $conn);

	//echo "<br> HOMES <br>";

	$homes = array();
	if (mysql_num_rows($homeResult) > 0) {
		while ($row = mysql_fetch_assoc($homeResult)) {
			$address = $row['address']; 
			$city = $row['city'];
			$state = $row['state'];
			$homeownerName = $row['username'];
			$homeId = $row['homeId'];
			$spotsAvailableQuery = mysql_query("SELECT count(spotId), price from Spots where homeId = $homeId and taken = false", $conn);
			$row2 = mysql_fetch_assoc($spotsAvailableQuery);
			$spotsAvailable = $row2['count(spotId)'];
			$price = $row2['price'];
			$homeownerPhone = $row['phone'];
			$homeownerEmail = $row['email'];
			$homeownerContact = "Phone number: " . $homeownerPhone . " Email: " . $homeownerEmail;
			$fullAddress = "$address" . ", " . "$city" . ", " . "$state";
			$homeLonLat = get_lonlat($fullAddress);
			$home['title'] = "Parking By: " . $homeownerName . "<br>Spots Available: " . $spotsAvailable . "<br>Price: $" . $price;
			$home['spotsAvailable'] = $spotsAvailable;
			$home['thumb'] = 'img&#47drop.png';
			$home['text'] = "$homeownerContact";
		 	$home['tags'] = "Parking";
		 	unset($home['loc']);
		 	$home['loc'][] = $homeLonLat->lat; 
		 	$home['loc'][] = $homeLonLat->lng;
		 	$home['homeId'] = $homeId;
		 	$homes[] = $home;
		}
		
	} else {
			//echo "<h4> NO RESULTS </h4>";
	}

	foreach ($homes as $i => $value) {
		$value = $homes[$i];
		//echo  json_encode($value);
		//echo "<br>";
	}

	echo json_encode($events);
	

	
	
	mysql_close($conn);
	
?>