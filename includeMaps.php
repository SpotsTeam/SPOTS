<script>
	<?include("getEvents.php");?>

	var events = <?php echo json_encode($events)?>;
	var homes = <?php echo json_encode($homes)?>;
	


    for(var i = 0; i < events.length; i++) {
    	document.write(events[i]['title'] + "<br>");
    }



	// function reqListener() {
	// 	console.log(this.responseText);
	// }

	// var oReq = new XMLHttpRequest();
	// oReq.onload = function() {
	// 	var data = this.responseText;
	// 	obj = JSON.parse(data);
	// 	string = "";
	// 	string = obj[0].title;
	// 	document.write(obj[0].loc +"<br>")
	// 	document.write(string)
	// 	//alert(data);
	// };
	// oReq.open("get", "getEvents.php", true);
	// oReq.send()
	





</script>