<?php
	session_start();
	
	$arr = $_SESSION['koszyk'];
	$zamowienie = null;
	$suma = $_SESSION['suma'];
	$user = $_SESSION['login'];
	$data = date("Y,m,d g:i:s");   
	foreach ($arr as $key) {
	
		 $zamowienie .= $key['tytul']."//";
	}
	$sql = "INSERT INTO `zamowienia`(`przedmioty`, `cena`, `user`, `data`) VALUES ('$zamowienie','$suma', '$user','$data')";
	echo $sql;
	require_once "connect.php";
		
		$polaczenie = @new mysqli($servername,$user,$password,$database);
		
		if($polaczenie -> connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno." Opis :".$polaczenie->connect_error;
		}
		else
		{	
			$polaczenie->query('SET NAMES utf8');
			$polaczenie->query('SET CHARACTER_SET utf8_unicode_ci');

			$polaczenie->query($sql);
		}
		$polaczenie->close();
		$_SESSION['koszyk'] = null;
		$zamowienie = null;
		$_SESSION['suma'] = 0;
		$_SESSION["ileKoszyk"] = 0;
		header('Location: index.php?zamowienie=1');
?>