<?php
		require_once "connect.php";
		
		$polaczenie = @new mysqli($servername,$user,$password,$database);
		
		if($polaczenie -> connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno." Opis :".$polaczenie->connect_error;
		}
		else
		{	
			$gatunek = @$_GET['gatunek'];
			$rodzaj = @$_GET['rodzaj'];
			$today = date("Y,m,d g:i:s");
			$limitTyg = date('Y-m-d h:m:s', strtotime("-1 week"));
			$limitMie = date('Y-m-d h:m:s', strtotime("-1 month"));
			$limitRok = date('Y-m-d h:m:s', strtotime("-1 year"));
			//$today_dt = new DateTime($today);
			//$limit_dt = new DateTime($limit);
			
			
			switch($gatunek)
			{
				case "Dladzieci":
					$gatunek = "Dla dzieci";
					break;
				case "Wyscigowe":
					$gatunek = "Wyścigowe";
					break;
				default:
					break;
			}
			
			
	
			switch($rodzaj){
					case "konsolowe":
						$sql = "SELECT * FROM gry WHERE gatunek='$gatunek' AND ((((platforma LIKE '%PS4%' OR platforma LIKE '%XBOXONE%') OR platforma LIKE '%PS3%') OR platforma LIKE '%XBOX360%') OR platforma LIKE '%WII%') ORDER BY tytul ASC";
						break;
					case "pc":
						$sql = "SELECT * FROM gry WHERE gatunek='$gatunek' AND platforma LIKE '%PC%' ORDER BY tytul ASC";
						break;
					case "XBOX360":
						$sql = "SELECT * FROM gry WHERE platforma LIKE '%XBOX360%' ORDER BY tytul ASC";
						break;
					case "XBOXONE":
						$sql = "SELECT * FROM gry WHERE platforma LIKE '%XBOXONE%' ORDER BY tytul ASC";
						break;
					case "PS4":
						$sql = "SELECT * FROM gry WHERE platforma LIKE '%PS4%' ORDER BY tytul ASC";
						break;
					case "PS3":
						$sql = "SELECT * FROM gry WHERE platforma LIKE '%PS3%' ORDER BY tytul ASC";
						break;
					case "WII":
						$sql = "SELECT * FROM gry WHERE platforma LIKE '%WII% ORDER BY tytul ASC'";
						break;
					case "konsoloweall":
						$sql = "SELECT * FROM gry WHERE platforma LIKE '%WII%' OR (((platforma LIKE '%PS4%' OR platforma LIKE '%XBOXONE%') OR platforma LIKE '%PS3%') OR platforma LIKE '%XBOX360%') ORDER BY tytul ASC";
						break;
					case "pcall":
						$sql = "SELECT * FROM gry WHERE platforma LIKE '%PC%' ORDER BY tytul ASC";
						break;
					case "fifa16":
						$sql = "SELECT * FROM gry WHERE tytul = 'Fifa 16'";
						break;
					case "battlefront":
						$sql = "SELECT * FROM gry WHERE tytul = 'Star Wars Battlefront'";
						break;
					case "fallout4":
						$sql = "SELECT * FROM gry WHERE tytul = 'Fallout 4'";
						break;
					case "tydzienPc":
						$sql = "SELECT * FROM gry WHERE (platforma = 'PC') AND (dataPremiery >= '$limitTyg') AND (dataPremiery <= '$today')"; 
						break;
					case "miesiacPc":
						$sql = "SELECT * FROM gry WHERE (platforma = 'PC') AND (dataPremiery >= '$limitMie') AND (dataPremiery <= '$today')";
						break;
					case "rokPc":
						$sql = "SELECT * FROM gry WHERE (platforma = 'PC') AND (dataPremiery >= '$limitRok') AND (dataPremiery <= '$today')";
						break;
						case "tydzienKon":
						$sql = "SELECT * FROM gry WHERE (dataPremiery >= '$limitTyg') AND (dataPremiery <= '$today') AND (platforma LIKE '%WII%' OR (((platforma LIKE '%PS4%' OR platforma LIKE '%XBOXONE%') OR platforma LIKE '%PS3%') OR platforma LIKE '%XBOX360%')) ORDER BY tytul ASC";
						break;
					case "miesiacKon":
						$sql = "SELECT * FROM gry WHERE (dataPremiery >= '$limitMie') AND (dataPremiery <= '$today') AND (platforma LIKE '%WII%' OR (((platforma LIKE '%PS4%' OR platforma LIKE '%XBOXONE%') OR platforma LIKE '%PS3%') OR platforma LIKE '%XBOX360%')) ORDER BY tytul ASC";
						break;
					case "rokKon":
						$sql = "SELECT * FROM gry WHERE (dataPremiery >= '$limitRok') AND (dataPremiery <= '$today') AND (platforma LIKE '%WII%' OR (((platforma LIKE '%PS4%' OR platforma LIKE '%XBOXONE%') OR platforma LIKE '%PS3%') OR platforma LIKE '%XBOX360%')) ORDER BY tytul ASC";
						break;
					default:
						break;
				}

		
			
			$polaczenie->query('SET NAMES utf8');
			$polaczenie->query('SET CHARACTER_SET utf8_unicode_ci');

			if($rezultat = $polaczenie->query($sql))
			{
				$czy_istnieja_gry = $rezultat->num_rows;
				if($czy_istnieja_gry == 0)
				{
					echo '<div class="row" style="padding-left: 15px">BRAK GIER';
					echo '</div>';
				}
				else
				{
					while($wiersz = $rezultat->fetch_assoc())
					{
					
						
						
						$id = $wiersz['idGry'];
						$tytul = $wiersz['tytul'];
						$gatunek = $wiersz['gatunek'];
						$dataPremiery = $wiersz['dataPremiery'];
						$ocena = $wiersz['ocena'];
						$platforma = $wiersz['platforma'];
						$obrazek = $wiersz['obrazek'];
						$cena = $wiersz['cena'];
						
						echo '<div class="row">';
						echo '	<div class="productBox">';
						echo '		<div class="productBoxImg"><img alt="'.$tytul.'" src="'.$obrazek.'" /></div>';
						echo '		<div class="productBoxOpis"><h4>'.$tytul.'</h4><p>'.$gatunek.'</p><p>'.$ocena.'</p><p>'.$platforma.'</p></div>';
						echo '		<div class="productBoxKup"><p>'.$cena.' zł</p><a href="../koszyk.php?id='.$id.'&dodaj=1"><button class="btn btn-default" type="button"><span class="glyphicon glyphicon-shopping-cart"></span> Dodaj do koszyka</button></a></div>';
						echo '	</div>';
						echo '</div>';
						echo '<hr>';
					}
				}
				
			}
			$rezultat->free_result();
			$polaczenie->close();
		}

?> 