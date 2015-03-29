<html>
<script type = "text/javascript" src="http://maps.google.com/maps/api/js?/sensor=false"></script>
<script type = "text/javascript">
	var geocoder = new google.maps.Geocoder();
	var address = "Dallas, TX"

	geocoder.geocode({'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			var latitude = results[0].geometry.location.lat()
			var longitute = results[0].geometry.location.lng();
			alert(latitude);
		}
	});
</script>
</html>