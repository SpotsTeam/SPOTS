var map = L.map('map', {
    center: [32.83993, -96.7831],
    zoom: 13
});

		L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'examples.map-i875mjb7'
		}).addTo(map);


		L.marker([32.83993, -96.7831]).addTo(map)
			.bindPopup("<b>Hello world!</b><br><button>Hello</button>").openPopup();
		

		var popup = L.popup();

		function onMapClick(e) {
			popup
				.setLatLng(e.latlng)
				//.setContent("You clicked the map at " + e.latlng.toString())
				//.openOn(map);
		}

		map.on('click', onMapClick);
