<?php 
	function get_lonlat(  $addr  ) {
	    try {
	            $coordinates = @file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($addr) . '&sensor=true');
	            $e=json_decode($coordinates);
	            // call to google api failed so has ZERO_RESULTS -- i.e. rubbish address...
	            if ( isset($e->status)) { if ( $e->status == 'ZERO_RESULTS' ) {echo '1:'; $err_res=true; } else {echo '2:'; $err_res=false; } } else { echo '3:'; $err_res=false; }
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

	echo "TEST<br>";

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
		echo "<h4>No results</h4>";
	}
	
	foreach ($events as $i => $value) {
		$value = $events[$i];
		echo  json_encode($value);
		echo "<br>";
	
	}

	$homeQuery = "SELECT * from Home natural join Homeowner";
	$homeResult = mysql_query($homeQuery, $conn);

	echo "<br> HOMES <br>";

	$homes = array();
	if (mysql_num_rows($homeResult) > 0) {
		while ($row = mysql_fetch_assoc($homeResult)) {
			$address = $row['address']; 
			$city = $row['city'];
			$state = $row['state'];
			$homeownerName = $row['username'];
			$homeownerPhone = $row['phone'];
			$homeownerEmail = $row['email'];
			$homeownerContact = "Phone number: " . $homeownerPhone . " Email: " . $homeownerEmail;
			$fullAddress = "$address" . ", " . "$city" . ", " . "$state";
			$homeLonLat = get_lonlat($fullAddress);
			$home['title'] = "House parking by: " . $homeownerName;
			$home['thumb'] = 'img&#47drop.png';
			$home['text'] = "$homeownerContact";
		 	$home['tags'] = "Parking";
		 	unset($home['loc']);
		 	$home['loc'][] = $homeLonLat->lat; 
		 	$home['loc'][] = $homeLonLat->lng;
		 	$homes[] = $home;
		}
		
	} else {
			echo "<h4> NO RESULTS </h4>";
	}

	foreach ($homes as $i => $value) {
		$value = $homes[$i];
		echo  json_encode($value);
		echo "<br>";
	}


	//echo json_encode($events);

	
	
	mysql_close($conn);
	
?>