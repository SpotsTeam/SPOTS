<?php include("../getEvents.php"); ?>

var events = <?php echo json_encode($events) ?>;
var homes = <?php echo json_encode($homes) ?>;


var map = L.map('map').setView([32.83993, -96.7831], 15);
mapLink = 
    '<a href="http://openstreetmap.org">OpenStreetMap</a>';
L.tileLayer(
    'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; ' + mapLink + ' Contributors',
    maxZoom: 18,
    }).addTo(map);

for (var i = 0; i < events.length; i++) {
	marker = new L.marker([events[i]['loc'][0],events[i]['loc'][1]])
		.bindPopup("<b>" + events[i]['title'] + "</b>")
		.addTo(map);
}

for (var i = 0; i < homes.length; i++) {
	var homeId = homes[i]['homeId'];
	marker = new L.marker([homes[i]['loc'][0],homes[i]['loc'][1]])
		.bindPopup(homes[i]['title'] + "<br><form action=\"../mapRegister.php\" method=\"post\"><input type=\"text\" name=\"spot\" value =\""+ homeId + "\" hidden><button type=\"submit\" onclick=\"return confirm(\'Reserve this spot?\')\";>Reserve</button></form>")
		.addTo(map);
}

//L.marker([32.83990, -96.7825]).addTo(map)
//		.bindPopup("<b>Hello world!</b><br><button onclick="return confirm('Reserve this spot?')";>Hello</button>").openPopup();
//
//		L.marker([32.83988, -96.78]).addTo(map)
//		.bindPopup("<b>"+sample+"</b><br><button>Hello</button>").openPopup();

