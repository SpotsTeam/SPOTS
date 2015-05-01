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

var RedIcon = L.Icon.Default.extend({
            options: {
            	    iconUrl: '/SPOTS/js/images/marker-icon-red.png' 
            }
         });
var redIcon = new RedIcon();

for (var i = 0; i < events.length; i++) {
	marker = new L.marker([events[i]['loc'][0],events[i]['loc'][1]], {icon: redIcon})
		.bindPopup("<b>" + events[i]['title'] + "</b>")
		.addTo(map);
	
}

for (var i = 0; i < homes.length; i++) {
	var homeId = homes[i]['homeId'];
	marker = new L.marker([homes[i]['loc'][0],homes[i]['loc'][1]])
		.bindPopup(homes[i]['title'] + "<br><form action=\"../mapRegister.php\" method=\"post\"><input type=\"text\" name=\"spot\" value =\""+ homeId + "\" hidden><button type=\"submit\" onclick=\"return confirm(\'Reserve this spot?\')\";>Reserve</button></form>")
		.addTo(map);
}




