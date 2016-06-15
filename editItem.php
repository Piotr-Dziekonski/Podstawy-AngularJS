<html>
	<?php
		session_start();
	?>
			<head>
				<link rel="stylesheet" href="css/bootstrap.min.css"/>
				<link rel="stylesheet" href="css/style.css"/>
			</head>
		
			<body>
			
			<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">INVENTARIO</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="log.php">Log</a>
						</li>
						<?php 
						if($_SESSION["admin"] == 1)
						{
							echo '<li><a href="backup.php">Copia de seguridad</a></li>';
						}
						?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php 
									if($_SESSION["admin"] == 1)
									{
										echo '<li><a href="newItem.php">Insertar</a></li>';
									}
						?>
						<li>
							<a href="filter.php">Filtro</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
			<div class="row">
				<div class="container">
					<div class="col-md-1">			
						<?php
							
							@$foundItem = $_SESSION['found'];
							
							
							require_once "connect.php";
							
							$connection = @new mysqli($servername,$user,$password,$database);
					
							if($connection -> connect_errno!=0)
							{
								echo "Error: ".$connection->connect_errno." Opis :".$connection->connect_error;
							}
							else
							{
								$sql = "SELECT * FROM hardware WHERE Id = $foundItem";
								
								if($result = @$connection->query($sql))
								{		
									$row = $result->fetch_assoc();
									
										$ID = $row["Id"];
										$tipo = $row["Tipo"];
										$ubicacion = $row["Ubicacion"];
										$nota_ubicacion = $row["Nota_Ubicacion"];
										$sn = $row["SN"];
										$puesto = $row["PUESTO"];
										$ise = $row["ISE"];
										$descripcion = $row["descripcion"];
										$comentario = $row["Comentario"];
										$fechaalta = $row["FechaAlta"];
										$fechabaja = $row["FechaBaja"];
										$causabaja = $row["CausaBaja"];
										
										
										$_SESSION['tipo'] = $tipo;
										$_SESSION['ubicacion'] = $ubicacion;
										$_SESSION['nota_ubicacion'] = $nota_ubicacion;
										$_SESSION['sn'] = $sn;
										$_SESSION['puesto'] = $puesto;
										$_SESSION['ise'] = $ise;
										$_SESSION['descripcion'] = $descripcion;
										$_SESSION['comentario'] = $comentario;
										$_SESSION['fechaalta'] = $fechaalta;
										$_SESSION['fechabaja'] = $fechabaja;
										$_SESSION['causabaja'] = $causabaja;

										echo '<table class = "mitabla table-bordered table-hover" style="width: auto !important"><form action="sendItem.php" method="post">
											<tr><td>ID: </td><td> '.$foundItem.'</td></tr>
											<tr><td>Tipo</td><td><input type="text" id="tipo" name="tipo" value="'; echo $tipo;    echo '"></input></td></tr>
											<tr><td>Ubicacion</td><td><input type="text" id="ubicacion" name="ubicacion" value="'; echo $ubicacion; 	echo '"></input></td></tr>
											<tr><td>Nota Ubicacion</td><td><input type="text" id="nota_ubicacion" name="nota_ubicacion" value="'; echo $nota_ubicacion;    echo '"></input></td></tr>
											<tr><td>SN</td><td><input type="text" id="sn" name="sn" value="'; echo $sn;    echo '"></input></td></tr>
											<tr><td>Puesto</td><td><input type="text" id="puesto" name="puesto" value="'; echo $puesto;    echo '"></input></td></tr>
											<tr><td>ISE</td><td><input type="text" id="ise" name="ise" value="'; echo $ise;    echo '"></input></td></tr>
											<tr><td>Descripcion</td><td><input type="text" id="descripcion" name="descripcion" value="'; echo $descripcion;    echo '"></input></td></tr>
											<tr><td>Comentario</td><td><input type="text" id="comentario" name="comentario" value="'; echo $comentario;    echo '"></input></td></tr>
											<tr><td>Fecha alta</td><td><input type="text" id="fechaalta" name="fechaalta" value="'; echo $fechaalta;    echo '"></input></td></tr>
											<tr><td>Fecha baja</td><td><input type="text" id="fechabaja" name="fechabaja" value="'; echo $fechabaja;    echo '"></input></td></tr>
											<tr><td>Causa baja</td><td><input type="text" id="causabaja" name="causabaja" value="'; echo $causabaja;    echo '"></input></td></tr>
											</br>
											</table>
											<center><input type="submit" value="Aplicar" name="actionButton"/></center>
											</form> ';
										
										
										
										
									
									

								}
							}
						
					


					
						?>
					</div>
				</div>
			</div>
			<?php
				if(!empty($_SESSION["results"]))
				{
					echo '<center><a href='.$_SESSION['results'].'>Regresar a filtrar resultados</a></center>';
					$_SESSION['results'] = 0;
				}
			?>
			<div class = "row">
					<div class = "container">
						<div class="col-md-11">	
						</div>
					</div>
			</div>


	</body>
</html>