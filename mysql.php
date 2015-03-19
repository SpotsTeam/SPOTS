<html><h2>
<?php
	$con = mysql_connect("localhost", "phpuser", "sharpclaw");
	if (!$con) {
		die('could not connect: ' .mysql_error());
	}
 
	mysql_select_db("phptest", $con) or die("Unable to select database:" .mysql_error());

	//$input = mysql_query("Create table HomeOwners(id int primary key, fname varchar(25), lname varchar(25), houseAddress varchar(50), zipcode int, spotsAvailable int");
	//mysql_query("Insert into HomeOwners values(0, "Erik","Gabrielsen", "810 Barton Creek Drive", 78620, 10)")

	$result = mysql_query("select * from students");
	while ($row = mysql_fetch_array($result)) {
		echo $row['id'] . " " . $row['fname'];
		echo "<br />";
	}
	mysql_close($con);
?>
</h2></html>
