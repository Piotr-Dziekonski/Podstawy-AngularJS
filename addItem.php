<?php 
			session_start();
			require_once "connect.php";
			
			$connection = @new mysqli($servername,$user,$password,$database);
			
			if($connection -> connect_errno!=0)
			{
				echo "Error: ".$connection->connect_errno." Opis :".$connection->connect_error;
			}
			else
			{	

				$tipo = $_POST["tipo"];
				$ubicacion = $_POST["ubicacion"];
				$nota_ubicacion = $_POST["nota_ubicacion"];
				$sn = $_POST["sn"];
				$puesto = $_POST["puesto"];
				$ise = $_POST["ise"];
				$descripcion = $_POST["descripcion"];
				$comentario = $_POST["comentario"];
				$fechaalta = $_POST["fechaalta"];
				$fechabaja = $_POST["fechabaja"];
				$causabaja = $_POST["causabaja"];
				
					$sql = "INSERT INTO `hardware`(`Id`, `Tipo`, `Ubicacion`, `Nota_Ubicacion`, `SN`, `PUESTO`, `ISE`, `descripcion`, `Comentario`, `FechaAlta`, `FechaBaja`, `CausaBaja`) 
					VALUES (NULL,'$tipo','$ubicacion','$nota_ubicacion','$sn','$puesto','$ise','$descripcion','$comentario','$fechaalta','$fechabaja','$causabaja')";

				mysqli_query($connection, $sql);
				
				require_once 'log.php';
				
				
				

				$connection->close();
				$location = "Location: ".$_SESSION['previouspage'];
				
				header($location);
			}
?>