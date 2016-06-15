<?php
			session_start();
			
			
			require_once "connect.php";
			
			$polaczenie = @new mysqli($servername,$user,$password,$database);
			
			if($polaczenie -> connect_errno!=0)
			{
				echo "Error: ".$polaczenie->connect_errno." Opis :".$polaczenie->connect_error;
			}
			else
			{	
				$login = $_POST['username'];
				$haslo = md5($_POST['password']);
				$sql = "SELECT * FROM user WHERE Login='$login' AND Haslo='$haslo'";
				
				if($rezultat = @$polaczenie->query($sql))
				{
					$czy_istnieje_user = $rezultat->num_rows;
					if($czy_istnieje_user > 0)
					{
						$wiersz = $rezultat->fetch_assoc();
						$_SESSION['login'] = $wiersz['login'];
						$_SESSION['haslo'] = $wiersz['haslo'];
						$_SESSION['user'] = $wiersz['login'];
						$_SESSION['zalogowano'] = 1;
						$_SESSION["ileKoszyk"] = 0;
						
						$rezultat->free_result();
						header('Location: index.php');
					}
					else
					{
						$_SESSION['zalogowano'] = 0;
						header('Location: index.php');
					}
				}
				
				$polaczenie->close();
			}
			
	?>
