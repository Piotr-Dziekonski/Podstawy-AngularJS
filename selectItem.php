<html>
	<?php
		session_start();
		
		$IDedit = $_GET['tempid'];
		
		require_once "connect.php";
		$connection = @new mysqli($servername,$user,$password,$database);
			
					if($connection -> connect_errno!=0)
					{
						echo "Error: ".$connection->connect_errno." Opis :".$connection->connect_error;
					}
					else
					{
						$sql = "SELECT * FROM hardware WHERE Id = $IDedit";
						
						if($result = @$connection->query($sql))
						{		
							while($row = $result->fetch_assoc())
							{
								$_SESSION['found'] = $row["Id"];
							}
						}
					}

				header('Location: editItem.php');
?>