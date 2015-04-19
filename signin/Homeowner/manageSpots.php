<?php 
    include("../login.php");
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spots Events Page</title>

    <!-- Bootstrap CSS -->
    <link href="/SPOTS/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/SPOTS/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    <!-- TipueDrop CSS -->
    <link href="/SPOTS/css/tipuedrop.css" rel="stylesheet">
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
                
            </div>
        </div>
    </div>

    <div style="margin-top:80px" class="centered">
        <h2>Manage Spots</h2></br></br>
    </div>
    
    <div style="margin-left:80px" class="centered">
        <div style="margin-right:80px" class="centered">
            <fieldset>
                <legend>Your Home</legend> 
        </div>
    </div>
    
    <div style="margin-left:80px" class="left">
        <div style="margin-right:80px" class="right">
            <?php 
                include("../home.php");
                $address = $_SESSION['home'];
                echo "<h4>Current House Address: $address</h4>";    
            ?>
             <form method = "post" action="addHome.html">
                    <button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none; margin-left: 150px"> 
                    <i class="fa fa-1x fa-car"></i> Add House </button>
                    
            </form><br>

            <form method = "post" action="changeHome_1.php">
                    <button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none; margin-left: 140px"> 
                    <i class="fa fa-1x fa-car"></i> Change House </button>
                    
                </form>
            </fieldset><br><br><br><br>
        </div>
    </div>

    <div style="margin-left:80px" class="centered">
        <div style="margin-right:80px" class="centered">
                
            <fieldset>
                <legend>Available Spots</legend>
        </div>
    </div>

    <div style="margin-left:80px" class="left">
        <div style="margin-right:80px" class="right">
            <?php 
                include("showSpots.php");
                $spots = $_SESSION['spots'];
                echo "$spots";
            ?>
            </fieldset><br><br><br><br>
        </div>
    </div>

    <div style="margin-left:80px" class="centered">
        <div style="margin-right:80px" class="centered">
            <fieldset>
                <legend>Spots Reserved</legend>
        </div>
    </div>

    <div style="margin-left:80px" class="left">
        <div style="margin-right:80px" class="right">
            <?php 
                include("reservedSpots.php");
                $spots = $_SESSION['spotsReserved'];
                echo "$spots";
                
            ?>
            </fieldset><br><br><br><br>
        </div>
    </div>

    <div style="margin-left:80px" class="centered">
        <div style="margin-right:80px" class="centered">       
            <fieldset>
                <legend>Add/Remove Spots</legend>
        </div>
    </div>

    <div style="margin-left:80px" class="left">
        <div style="margin-right:80px" class="right">
            <?php 
                
            ?>
            </fieldset><br><br><br><br>
        </div>
    </div>
                
    <div style="margin-left:80px" class="centered">
        <div style="margin-right:80px" class="centered">       
                <fieldset>
                    <legend>Edit Spots Pricing</legend>
                <form method = "post" action="changePrice.php">
                    <label >New Price: </label> <input type="text" name="newPrice"><br><br>
                    <button data-toggle="modal" data-target="#myModal" class=" btn-lg btn btn-info" style="outline:none; margin-left: 150px"> 
                    <i class="fa fa-1x fa-car"></i> Change </button>
                    
                </form>
                    
        </div>
    </div>

    <div style="margin-left:80px" class="left">
        <div style="margin-right:80px" class="right">
                    <?php 
                        
                    ?>
                </fieldset><br><br><br><br>
        </div>
    </div>

        
</body>

<html>

