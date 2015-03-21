<hmtl>
<head><title>Sample Form Test</title></head>
<body>
	<?
		if(isset($_POST['name']))
		{
			$name = $_POST['name'];
			$age = $_POST['age'];
			$yearBorn = 2014 - $age;
			$age = $age+1;
			echo "<h1>$name, on your next birthday you will be $age</h1>";
			echo "<h3>$name, you were born in $yearBorn</h3>";
		}
		
// 		$cxn = mysqli_connect ("localhost","user","spots","phptest"); //localhost, your user name, password, name of database
// 		mysqli_query(SELECT * from Students ORDER BY lname ASC)
		?>
		
		<h3>Please Enter Some Info</h3>
		<form method="get" action="sampleform2.php">
			Tell me your name: <input type = "text" name = "name" /><br/>
			How old are you?<input type = "text" name = "age" /><br/>
			<input type = "submit"/>
		</form>
</body>
</html>