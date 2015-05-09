
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adding Home</title>

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
                <a href="/SPOTS/signin/homePage.php">
					<img alt="" src="/SPOTS/img/spotslogo2.png" class="img-brand"></img>
				</a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="navbar-left">
				
				</div>
				<ul class="nav navbar-nav navbar-right">
					
					<li> <form action="/SPOTS/signin/Homeowner/manageSpots.php" class="inline"><button class="dlink btn btn-lg btn-info"  style="outline:none"> 
						<i class="fa fa-1x fa-street-view"> </i>Back </button></form></li>
					
				</ul>
			</div>
		</div>
	</div>


	<!-- Main Body -->	

	<div style="margin-top:80px" class="centered">
	<h2>Choose Home for Managing <img alt="" src="/SPOTS/img/spotslogo2.png" class="img-brand"></img></h2>
	
	<form method = "post" action="changeHome.php">
		
		<span style="padding: 0 20px">&nbsp;</span><label>Select Home:</label> 
		<select name="Home" id="selectHome">
					
		</select>

		<?php include("changeHome.php"); 
		?>
		<script>
			(function () {
				
			    var elm = document.getElementById('selectHome'),
			        df = document.createDocumentFragment();
			    var homes = <?php echo json_encode($address); ?>;
			    var count = <?php echo json_encode($count); ?>;
			    var homeId = <?php echo json_encode($homeId); ?>;
			    for (var i = 0; i < count; i++) {
			        var option = document.createElement('option');
			        option.value = homeId[i];  //the value that is sent in the post
			        option.appendChild(document.createTextNode(homes[i]));  //what the select option is
			        df.appendChild(option);
			    }
			    elm.appendChild(df);
			}());
		</script>
			
		<br><br><br>
		<button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none; margin-left: 150px"> 
						<i class="fa fa-1x fa-car"></i> Select </button>
	</div>
</body>

<html>
