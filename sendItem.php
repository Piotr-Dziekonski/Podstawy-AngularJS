<html>
	<?php
		session_start();
		
					
					$ID = $_SESSION["znaleziony"];
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

					require_once "connect.php";
					
					$connection = @new mysqli($servername,$user,$password,$database);
			
					if($connection -> connect_errno!=0)
					{
						echo "Error: ".$connection->connect_errno." Opis :".$connection->connect_error;
					}
					else
					{
						$sql = "UPDATE `hardware` SET `Tipo`= '$tipo',`Ubicacion`='$ubicacion',`Nota_Ubicacion`='$nota_ubicacion',`SN`='$sn',`PUESTO`='$puesto',`ISE`='$ise',`descripcion`='$descripcion',`Comentario`='$comentario',`FechaAlta`='$fechaalta',`FechaBaja`='$fechabaja',`CausaBaja`='$causabaja' WHERE `Id` = '$ID'";
						
						mysqli_query($connection, $sql);
						
						require_once "log.php";
						
						$connection->close();
						
					}
					$location = "Location:".$_SESSION['previouspage'];
					header($location);
					
					
					


			
				?>
				</div>
	</body>
</html>