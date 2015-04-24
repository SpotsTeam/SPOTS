// var test = "";

// function reqListener() {
// 		console.log(this.responseText);
// 	}

// 	var oReq = new XMLHttpRequest();
// 	oReq.onload = function() {
// 		var data = this.responseText;
// 		obj = JSON.parse(data);
// 		//test = obj[0].loc;
// 		test = obj[0].title;
// 		//alert(data);
// 	};
// 	oReq.open("get", "/SPOTS/getEvents.php", true);
// 	oReq.send()



//document.write(events[1]['loc']);
var planes = [
		["hellp",32.83993, -96.7831],
		["7C6CA1",-41.49413,173.5421],
		["7C6CA2",-40.98585,174.50659],
		["C81D9D",-40.93163,173.81726],
		["C82009",-41.5183,174.78081],
		["C82081",-41.42079,173.5783],
		["C820AB",-42.08414,173.96632],
		["C820B6",-41.51285,173.53274]	
		];

        var map = L.map('map').setView([32.83993, -96.7831], 15);
        mapLink = 
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,
            }).addTo(map);

		for (var i = 0; i < planes.length; i++) {
			marker = new L.marker([planes[i][1],planes[i][2]])
				.bindPopup(planes[i][0])
				.addTo(map);
		}

		L.marker([32.83990, -96.7825]).addTo(map)
 			.bindPopup("<b>Hello world!</b><br><button>Hello</button>").openPopup();

 			L.marker([32.83988, -96.78]).addTo(map)
 			.bindPopup("<b>"+test+"</b><br><button>Hello</button>").openPopup();



// var map = L.map('map', {
//     center: [32.83993, -96.7831],
//     zoom: 13
// });

// 		L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {
// 			maxZoom: 18,
// 			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
// 				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
// 				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
// 			id: 'examples.map-i875mjb7'
// 		}).addTo(map);


// 		L.marker([32.83993, -96.7831]).addTo(map)
// 			.bindPopup("<b>Hello world!</b><br><button>Hello</button>").openPopup();
		

// 		var popup = L.popup();

// 		function onMapClick(e) {
// 			popup
// 				.setLatLng(e.latlng)
// 				//.setContent("You clicked the map at " + e.latlng.toString())
// 				//.openOn(map);
// 		}

// 		map.on('click', onMapClick);
