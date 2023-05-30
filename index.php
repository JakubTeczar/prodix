<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: app.php');
		exit();
	}if(isset($_SESSION['zalogowany'])){
		echo $_SESSION['blad'];
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="./css/styleLogin.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teczi Company</title>
</head>

<body>
		<div class="glass">
			<div class="login">
				
				<form action="login.php" method="post">
					<div class="form">
						<input  type="text" name="login" value='' required autocomplete="off">
						<label for="name" class="label-name">
							<span class="content-name">LOGIN</span> 
						</label>
					</div>
					<div class="form">
						<input  type="password" value='' name="haslo" required>
						<label for="name" class="label-name">
							<span class="content-name">HASŁO</span> 
						</label>
				
					</div><button type="submit" class="button"  >ZALOGUJ</button>
					<div style="text-align:center;margin-top:.5em">
					<?php
						if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
					?>
					</div>
					<a class="register" href="php/rejestracja.php" >REJESTRACJA</a>

				</form>
			</div>
		</div>
		
	


</body>
</html>