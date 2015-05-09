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

    <div class="editHomeContainer">

        <h1>Manage Your Spots</h1>

        <div class="editHomeSection">
            <fieldset>
                <legend>Your Home</legend> 
                <?php 
                    include("../home.php");
                    $address = $_SESSION['home'];
                    echo "<h4>Current House Address: $address</h4>";    
                ?>
                 <form method = "post" action="addHome.html">
                        <button data-toggle="modal" data-target="#myModal" class="button green-button"> 
                            <span class="col-sm-1 button-icon"><i class="fa fa-2x fa-home "></i></span>
                            <span class="col-sm-10 text-right">Add House </span>
                        </button>
                </form>
            </fieldset>
        </div>

    <form method="post" action="changeHome.php"> 
        <div style="padding:30px 0">
        <label style="line-height:2.3; margin-left:-60px;">Select Home:</label> 
        <select name="Home" id="selectHome" class="form-control" style="width:200px"> </select> <br><br>
        <?php include("changeHome.php"); ?>
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
            
        <button data-toggle="modal" data-target="#myModal" class="button blue-button"> 
            <span class="col-sm-1 button-icon"><i class="fa fa-2x fa-home "></i></span>
            <span class="col-sm-10 text-right">Change House </span>
        </button>
    </div>
    </form>

        <!-- Next Section -->
        <div class="editHomeSection" >
            <legend style="font-size: 22pt">Available Spots</legend>
            <fieldset class="tableContainer1">

                <table class="table">
                    <?php 
                        include("showSpots.php");
                        $spots = $_SESSION['spots'];
                        echo "$spots";
                    ?>
                </tbody>
                </table>
            </fieldset>
        </div>

        <!-- Next Section -->
            <div class="editHomeSection">
            <legend style="font-size:22pt">Spots Reserved</legend>
            <fieldset class="tableContainer2">
                <table class="table">
                <?php 
                    include("reservedSpots.php");
                    $spots = $_SESSION['spotsReserved'];
                    echo "$spots";
                    
                ?>
                </tbody>
            </table>
            </fieldset>
        </div>
               
        <!-- Next Section -->
        <div class="editHomeSection">  
            <fieldset>
                <legend>Edit Spots Pricing</legend>
                <form method = "post" action="changePrice.php">
                    <label>New Price: </label> <input type="text" name="newPrice" class="form-control" style="width:75px"><br><br>
                    <button data-toggle="modal" data-target="#myModal" class="red-button button"> 
                        <span class="col-sm-1 button-icon"><i class="fa fa-2x fa-dollar "></i></span>
                        <span class="col-sm-10 text-right">Change Price </span>
                    </button>
                    
                </form>
                <?php 
                        
                    ?>
            </fieldset>
        </div>
        
</body>

<html>

