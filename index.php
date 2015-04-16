<?php


function getIngredient() 
{
   global $conn;
            $conn = mysql_connect($servername, $databaseUsername, $databasePassword);

            // Check connection
            if (!$conn) 
            {
                //if the connection fails then we kill the whole thing
                die("Connection failed: " . mysql_error());
            } else {
                echo "database successfully connected<br>";
            }

            mysql_select_db($database);

    //initialise list 
    $result_list = array();
    
    //query DB 
    $result = $con->query( "SELECT * FROM ingredient");
    
    while ($rows = mysqli_fetch_row($result)) 
    {
        $ingredient_list[] = $rows;
    }
    //return the result 
    echo json_encode($ingredient_list);
    $con->close();
}// end function getIngredient 