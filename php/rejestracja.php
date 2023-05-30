<?php

	session_start();
	
	if (isset($_POST['login']))
	{
		$wszystko_OK=true;
		
		$nick = $_POST['login'];
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="login musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="login może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
	
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}				
		
		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "connect.php";
		
		try 
		{
				
				$query = "SELECT id FROM uzytkownicy WHERE login='$nick'";
				$rezultat = mysqli_query($connection, $query);
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już taki login! Wybierz inny.";
				}
				
				if ($wszystko_OK==true)
				{
					$query2 = "INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', 'zwykly')";
					$rezultat2 = mysqli_query($connection, $query2);
					if ($rezultat2)
					{
						$_SESSION['udanarejestracja']=true;

						$query5 = "SELECt * FROM uzytkownicy WHERE login='{$nick}'";
						$rezultat5= mysqli_query($connection, $query5);
						$wiersz5 = $rezultat5->fetch_assoc();
						$ID5 = $wiersz5['id'];
						
						//tworzenie pustych plikow json
						$query6 = "INSERT INTO `cwiczenia` (`IDZadania`, `IDUzytkownika`, `cwiczenie`) VALUES (NULL, $ID5 , '[]')";
						mysqli_query($connection, $query6);

						$query7 = "INSERT INTO `serie` (`IDSeri`, `IDUzytkownika`, `seria`) VALUES (NULL,  $ID5 , '[]');";
						mysqli_query($connection, $query7);
						
						$query8 = "INSERT INTO `plany` (`IDPlanu`, `IDUzytkownika`, `plan`) VALUES (NULL, $ID5, '[]');";
						mysqli_query($connection, $query8);

						$query9 = "INSERT INTO `historia` (`IDHistori`, `IDUzytkownika`, `dane`) VALUES (NULL, $ID5, '[]');";
						mysqli_query($connection, $query9);

						$query10 = "INSERT INTO `pomiary` (`IDPomiary`, `IDUzytkownika`, `pomiary`) VALUES (NULL, $ID5, '[]');";
						mysqli_query($connection, $query10);
						header('Location: witamy.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TECZI COMPANY</title>
	<link rel="stylesheet" href="./styleRegistration.css">
	<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
	<style>
		
	</style>
</head>

<body>
	
	<form method="post">
	<div class="container">
		Login: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_nick']))
			{
				echo $_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}
		?>" name="login" /><br />
		
		<?php
			if (isset($_SESSION['e_nick']))
			{
				echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
			}
		?>
		
		
		Twoje hasło: <br /> <input type="password"  value="<?php
			if (isset($_SESSION['fr_haslo1']))
			{
				echo $_SESSION['fr_haslo1'];
				unset($_SESSION['fr_haslo1']);
			}
		?>" name="haslo1" /><br />
		
		<?php
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
		?>		
		
		Powtórz hasło: <br /> <input type="password" value="<?php
			if (isset($_SESSION['fr_haslo2']))
			{
				echo $_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}
		?>" name="haslo2" /><br />
		
		<label>
			<input type="checkbox" name="regulamin" <?php
			if (isset($_SESSION['fr_regulamin']))
			{
				echo "checked";
				unset($_SESSION['fr_regulamin']);
			}
				?>/> Wchodzę na własną odpowiedzialność
		</label>
		
		<?php
			if (isset($_SESSION['e_regulamin']))
			{
				echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
		?>	
		
		<!-- <div class="g-recaptcha" data-sitekey="PODAJ WŁASNY SITEKEY!"></div> -->
		
		<?php
			// if (isset($_SESSION['e_bot']))
			// {
			// 	echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
			// 	unset($_SESSION['e_bot']);
			// }
		?>	
		
		<br />
		
		<input type="submit" value="Zarejestruj się" />
	</div>	
	</form>

</body>
</html>
