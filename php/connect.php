<?php
 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$database = "strefaucznia";

	$connection = @mysqli_connect($host, $user, $pass, $database); // or die('Brak połączenia!');    //   mysqli_    NIE!!!: mysql_connect
	mysqli_set_charset($connection, "utf8_polish_ci");
	if(!$connection)
	{
		echo "Brak połączenia!";
		exit();
	}

?>