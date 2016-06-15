<?php
			@session_start();
			$_SESSION['admin'] = null;
			$_SESSION['user'] = 'piotr';
			if(empty($_SESSION['admin']))
			{
			
				require_once "connect.php";
				
				$connection = @new mysqli($servername,$user,$password,$database);
				
				if($connection -> connect_errno!=0)
				{
					echo "Error: ".$connection->connect_errno." Opis :".$connection->connect_error;
				}
				else
				{	
					$login = $_SESSION['user'];
					
					$sql = "SELECT * FROM users WHERE user='$login'";
					
					if($result = @$connection->query($sql))
					{
						$czy_istnieje_user = $result->num_rows;
						if($czy_istnieje_user > 0)
						{
							$row = $result->fetch_assoc();
							
							if(!empty($row["admin"]))
							{
								$_SESSION['admin'] = 1;
							}
							$result->free_result();
							
						}
						else
						{
							$_SESSION['admin'] = 0;
						}
					}
					
					$connection->close();
				}
			}
?>