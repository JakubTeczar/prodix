<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	require "php/connect.php";

		
	

		$login = $_POST['login'];
		$haslo = $_POST['haslo'];

		$query = "SELECt * FROM uzytkownicy WHERE login='{$login}'";
		$rezultat= mysqli_query($connection, $query);
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		echo 'zalogowany';
		if ($rezultat)
		{
			echo 'zalogowany2';
			$ilu_userow = mysqli_num_rows($rezultat);
			
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();
				
				if (password_verify($haslo, $wiersz['haslo']))
				{
					$_SESSION['zalogowany'] = true;
					// $_SESSION['id'] = $wiersz['id'];
					$_SESSION['login'] = $login;
					$_SESSION['id'] = $wiersz['id'];
					// $_SESSION['drewno'] = $wiersz['drewno'];
					// $_SESSION['kamien'] = $wiersz['kamien'];
					// $_SESSION['zboze'] = $wiersz['zboze'];
					// $_SESSION['email'] = $wiersz['email'];
					// $_SESSION['dnipremium'] = $wiersz['dnipremium'];
					
					
					// $rezultat->free_result();
					$x ="animation";
					$_SESSION["animation"]= $x ;
					header('Location:app.php');
				
					unset($_SESSION['blad']);
				}
				else 
				{
					
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
				}
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
			
		
		

		}
	
?>