<?php
	session_start();
	function dodaj($item) {
		$_SESSION['koszyk'][] = $item;
	}

	function usun($id) {
		unset($_SESSION['koszyk'][$id]);
	}
	
	if($_SESSION['zalogowano']== 1)
	{
		$id = $_GET['id'];
		@$ARRAY = $_GET['ARRAY'];
		
		require_once "connect.php";
				
		$polaczenie = @new mysqli($servername,$user,$password,$database);
		
		if($polaczenie -> connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno." Opis :".$polaczenie->connect_error;
		}
		else
		{	
			
			$sql = "SELECT * FROM gry WHERE idGry='$id'";
			
			if($rezultat = @$polaczenie->query($sql))
			{
				
					$wiersz = $rezultat->fetch_assoc();
					
					
					$tytul = $wiersz['tytul'];
					$obrazek = $wiersz['obrazek'];
					$cena = $wiersz['cena'];
					
					$rezultat->free_result();
					
				
				
			}
			
			$polaczenie->close();
		}
		
			
		$item = array('id'=>$id, 'tytul'=>$tytul, 'obrazek'=>$obrazek, 'cena'=>$cena,);
		if(@$_GET['dodaj'] == 1)
		{
			dodaj($item);
			$_SESSION["ileKoszyk"]++;
			$_SESSION['suma'] = $_SESSION['suma'] + $cena;
		}
		else if($_GET['usun'] == 1)
		{
			usun($ARRAY);
			$_SESSION["ileKoszyk"]--;
			$staraCena = $_SESSION['suma'];
			$nowaCena = $staraCena - $cena;
			$b = number_format($nowaCena, 2);
			
			$_SESSION['suma'] = $b;
			
			
		}

		header('Location: index.php?koszyk=1');
	}
	else
	{
		header('Location: index.php?anonymous=1');
	}

?>