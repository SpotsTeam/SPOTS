<html>
<head><title>SPOTS</title></head>
<body>
	<?
		if(isset($_POST['name'])) {
			$name = $_POST['name'];
			$age = $_POST['age'];
			$address = $_POST['address'];
			$spots = $_POST['spots'];
			$age - $age + 1;
			echo "<h1> Welcome Homeowner $name </h1>";
			echo "<h2> Address: $address </h2>";
			echo "<h2> Spots available to park: $spots </h2>";
		}
	?>
	<h2>Please Sign Up as Homeowner</h2>
	<form method = "post" action="sample.php">
		Tell me your name: <input type="text" name="name" /><br/>
		How old are you? <input type="text" name="age" /><br/>
		What is your address? <input type="text" name="address" /><br/>
		How many spots are available? <input type="text" name="spots" /><br/>
		<input type="submit" />
	</form>
</body>

<html>
