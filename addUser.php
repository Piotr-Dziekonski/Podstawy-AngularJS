<?php
	require_once "connect.php";
	
	$polaczenie = @new mysqli($servername,$user,$password,$database);
	
	if($polaczenie -> connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno." Opis :".$polaczenie->connect_error;
	}
	else
	{	
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$login = $_POST['login'];
		$ulica = $_POST['ulica'];
		$nrDomu = $_POST['nrDomu'];
		$nrMieszkania = $_POST['nrMieszkania'];
		$miasto = $_POST['miasto'];
		$haslo = $_POST['haslo'];
		$email = $_POST['email'];
		$md5haslo = md5($haslo);
		$sql = "SELECT * FROM user WHERE login='$login'";
		if($rezultat = @$polaczenie->query($sql))
				{
					$czy_istnieje_user = $rezultat->num_rows;
					if($czy_istnieje_user > 0)
					{
						header('Location: index.php?rejestracja=1&err=1');
					}
					else
					{
						$sql = "INSERT INTO `user` (`imie`, `nazwisko`, `login`, `haslo`, `ulica`, `nrDomu`, `nrMieszkania`, `miasto`) VALUES ('$imie', '$nazwisko',  '$login', '$md5haslo', '$ulica', '$nrDomu', '$nrMieszkania', '$miasto')";
		
						$polaczenie->query('SET NAMES utf8');
						$polaczenie->query('SET CHARACTER_SET utf8_unicode_ci');

						$polaczenie->query($sql);
						header('Location: index.php');
						
					}
				}
		$polaczenie->close();
		
	}
?>