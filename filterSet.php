<html>
	<?php
		session_start();
		include "checkUser.php";
	?>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
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
						if(@$_SESSION["admin"] == 1)
						{
							echo '<li><a href="backup.php">Copia de seguridad</a></li>';
						}
						?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php 
									if(@$_SESSION["admin"] == 1)
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
						<div class="col-md-12">
							
	<?php					
						
						require_once "connect.php";	
						
						$filterstartrow = $_GET["filterstartrow"];
						$connection = @new mysqli($servername,$user,$password,$database);
				
						if($connection -> connect_errno!=0)
						{
							echo "Error: ".$connection->connect_errno." Opis :".$connection->connect_error;
						}
						else
						{
							$array = array();
					
							if(!empty($_GET['Id']))
							{
								$array[] = "Id = '".$_GET['Id']."'";
							}
							if(!empty($_GET['tipo']))
							{
								$array[] = "Tipo = '".$_GET['tipo']."'";
							}
							
								if(!empty($_GET['ubicacionto']) AND !empty($_GET['ubicacionfrom']))
								{
									$array[] = "Ubicacion BETWEEN '".$_GET['ubicacionfrom']."' AND '".$_GET['ubicacionto']."'";
								}
								else if(!empty($_GET['ubicacionto']) XOR !empty($_GET['ubicacionfrom']))
								{
									if(!empty($_GET['ubicacionto']))
									{
										$array[] = "Ubicacion = '".$_GET['ubicacionto']."'";
									}
									else if(!empty($_GET['ubicacionfrom']))
									{
										$array[] = "Ubicacion = '".$_GET['ubicacionfrom']."'";
									}
								}
							
							if(!empty($_GET['nota_ubicacion']))
							{
								$array[] = "Nota_Ubicacion = '".$_GET['nota_ubicacion']."'";
							}
							if(!empty($_GET['sn']))
							{
								$array[] = "SN = '".$_GET['sn']."'";
							}
							if(!empty($_GET['puesto']))
							{
								$array[] = "PUESTO = '".$_GET['puesto']."'";
							}
							if(!empty($_GET['ise']))
							{
								$array[] = "ISE = '".$_GET['ise']."'";
							}
							if(!empty($_GET['fechaaltato']) AND !empty($_GET['fechaaltafrom']))
								{
									$array[] = "FechaAlta BETWEEN '".$_GET['fechaaltafrom']."' AND '".$_GET['fechaaltato']."'";
								}
								else if(!empty($_GET['fechaaltato']) XOR !empty($_GET['fechaaltafrom']))
								{
									if(!empty($_GET['fechaaltato']))
									{
										$array[] = "FechaAlta = '".$_GET['fechaaltato']."'";
									}
									else if(!empty($_GET['fechaaltafrom']))
									{
										$array[] = "FechaAlta = '".$_GET['fechaaltafrom']."'";
									}
								}
							if(!empty($_GET['fechabajato']) AND !empty($_GET['fechabajafrom']))
								{
									$array[] = "FechaBaja BETWEEN '".$_GET['fechabajafrom']."' AND '".$_GET['fechabajato']."'";
								}
								else if(!empty($_GET['fechabajato']) XOR !empty($_GET['fechabajafrom']))
								{
									if(!empty($_GET['fechabajato']))
									{
										$array[] = "FechaBaja = '".$_GET['fechabajato']."'";
									}
									else if(!empty($_GET['fechabajafrom']))
									{
										$array[] = "FechaBaja = '".$_GET['fechabajafrom']."'";
									}
								}
							
							
							if(!empty($array))
							{
								$where = 'WHERE '.implode(' and ', $array);
								$sql = "SELECT * FROM hardware ".$where; 
								if(!empty($_GET['sort']))
								{
									$sql = $sql." ORDER BY ".$_GET['sort'];
								}
								
							}
							else
							{
								$sql = "SELECT * FROM hardware ";
							}
								
	
						}
					
						
						if($answer = @$connection->query($sql))
						{
							$_SESSION['last'] = $_SERVER['REQUEST_URI'];
							$l = $_SESSION['last'];
							echo '<table class="mitabla table-bordered table-striped" style="font-size:0.8em !important"><thead>
									<tr>
										<th><a href="'.$l.'&sort=Id&page=1">Id</a></th>
										<th><a href="'.$l.'&sort=Tipo&page=1">Tipo</a></th>
										<th><a href="'.$l.'&sort=Ubicacion&page=1">Ubicacion</a></th>
										<th><a href="'.$l.'&sort=Nota_Ubicacion&page=1">Nota ubicacion</a></th>
										<th><a href="'.$l.'&sort=SN&page=1">Sn</a></th>
										<th><a href="'.$l.'&sort=PUESTO&page=1">Puesto</a></th>
										<th><a href="'.$l.'&sort=ISE&page=1">ISE</a></th>
										<th><a href="'.$l.'&sort=descripcion&page=1">Descripcion</a></th>
										<th><a href="'.$l.'&sort=Comentario&page=1">Comentario</a></th>
										<th><a href="'.$l.'&sort=FechaAlta&page=1">Fecha alta</a></th>
										<th><a href="'.$l.'&sort=FechaBaja&page=1">Fecha baja</a></th>
										<th><a href="'.$l.'&sort=CausaBaja&page=1">Causa baja</a></th>';
										if(@$_SESSION["admin"] == 1){echo '<th></th>';}
										echo'
									</tr>
								</thead>
								<tbody>';
							while($row = $answer->fetch_assoc())
							{
								
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
								
										echo "<tr>";
										echo " <td align = middle>";
										echo " $ID";
										echo " </td>";
										echo " <td>";
										echo " $tipo";
										echo " </td>";
										echo " <td align = right> ";
										echo " $ubicacion";
										echo " </td>";
										echo " <td align = right>";
										echo " $nota_ubicacion";
										echo " </td>";
										echo " <td>";
										echo " $sn";
										echo " </td>";
										echo " <td>";
										echo " $puesto";
										echo " </td>";
										echo " <td>";
										echo " $ise";
										echo " </td>";
										echo " <td>";
										echo " $descripcion";
										echo " </td>";
										echo " <td>";
										echo " $comentario";
										echo " </td>";
										echo " <td align = right>";
										echo " $fechaalta";
										echo " </td>";
										echo " <td align = right>";
										echo " $fechabaja";
										echo " </td>";
										echo " <td>";
										echo " $causabaja";
										echo " </td>";
										if(@$_SESSION["admin"] == 1)
										{
											echo " <td align='center'>
												<div class='btn-group'>
													<button type='button' class='btn dropdown-toggle' data-toggle='dropdown'>
														<span class='caret'></span>
													</button>
													<ul class='dropdown-menu' role='menu'>
													<li>
														<a href='selectItem.php?tempid=".$ID."'>Editar</a>
														<a href='deleteItem.php?tempid=".$ID."'>Eliminar</a>
													</li>
													</ul>
												</div>
												</td>";
										}
										echo "</tr>";
							}
							echo '</tbody></table>';
						}
					$_SESSION["results"] = $_SERVER['REQUEST_URI'];
					
					
						?>
						
					</div>
				</div>
			</div>
			<div class = "row">
					<div class = "container">
						<center><a href='<?php echo $_SESSION['previouspage'];?>'>Volver a la página anterior</a></center>
					</div>
			</div>
</html>