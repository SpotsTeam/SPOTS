<?php 
	session_start();
	if (session_destroy())
	{
		header("Location: /SPOTS/index.html");
	}
?>