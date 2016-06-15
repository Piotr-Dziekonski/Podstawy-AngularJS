	<?php
		session_start();
				if(!isset($_GET["log"]))
				{
					$foundItem = $_SESSION['found'];
					$idDeletedItem = $_GET['tempid'];
					
					require_once "connect.php";
					
					$connection = @new mysqli($servername,$user,$password,$database);
			
					if($connection -> connect_errno!=0)
					{
						echo "Error: ".$connection->connect_errno." Opis :".$connection->connect_error;
					}
					else
					{
						require_once "log.php";
						
						$sql = "DELETE FROM `hardware` WHERE `hardware`.`Id` = $idDeletedItem;";
						
						mysqli_query($connection, $sql);
					}
					$connection->close();
					if($_SESSION["maxpage"] *10 === $_SESSION["numofrows"])
					{
						$maxpage = (int)$_SESSION['maxpage'] - 1;
						$location = "Location: index.php?page=".$maxpage."&startrow=0&sort=";
					}
					else
					{
						$location = "Location:".$_SESSION['previouspage'];
					}

					header($location);
				}
				else
				{
					$idDeletedItem = $_GET['tempid'];
					
					require_once "connect.php";
					
					$connection = @new mysqli($servername,$user,$password,$database);
			
					if($connection -> connect_errno!=0)
					{
						echo "Error: ".$connection->connect_errno." Opis :".$connection->connect_error;
					}
					else
					{
						
						$sql = "DELETE FROM `log` WHERE `log`.`id` = $idDeletedItem;";
						
						mysqli_query($connection, $sql);
					}
					$connection->close();
					if($_SESSION["maxpage"] *10 === $_SESSION["numofrows"])
					{
						$maxpage = (int)$_SESSION['maxpage'] - 1;
						$location = "Location: index.php?page=".$maxpage."&startrow=0&sort=";
					}
					else
					{
						$location = "Location:".$_SESSION['previouspage'];
					}

					header($location);
				}

			
?>
