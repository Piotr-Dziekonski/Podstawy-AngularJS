<?php 
			session_start();	
			include "checkUser.php";
			
			
			require_once "connect.php";
			
			$connection = @new mysqli($servername,$user,$password,$database);
			
			if($connection -> connect_errno!=0)
			{
				echo "Error: ".$connection->connect_errno." Opis :".$connection->connect_error;
			}
			else
			{	
				if(isset($_POST['actionButton']) AND  $_POST['actionButton'] == 'Insertar')
				{
					
					$sql = "SELECT * FROM `hardware` WHERE `Tipo` = '$tipo' AND `Ubicacion` = '$ubicacion' AND  `Nota_Ubicacion` = '$nota_ubicacion' AND  `SN` = '$sn' AND  `PUESTO` = '$puesto' AND  `ISE` = '$ise' AND  `descripcion` = '$descripcion' AND  `Comentario` = '$comentario' AND  `FechaAlta` = '$fechaalta' AND  `FechaBaja` = '$fechabaja' AND  `CausaBaja` = '$causabaja'";
					if($result = @$connection->query($sql))
					{
						while($row = $result->fetch_assoc())
						{
							$id_hardware = $row["Id"]; // id_hardware
						}
					}
						$newItem[] = $tipo;
						$newItem[] = $ubicacion;
						$newItem[] = $nota_ubicacion;
						$newItem[] = $sn;
						$newItem[] = $puesto;
						$newItem[] = $ise;
						$newItem[] = $descripcion;
						$newItem[] = $comentario;
						$newItem[] = $fechaalta;
						$newItem[] = $fechabaja;
						$newItem[] = $causabaja;
				
				
				
					@$user = $_SESSION['user']; // usuario
					$pre = 'NULL'; //pre
					$post = implode('/',$newItem); //post
					//fecha is automatically set in table in database
					
					
					$sql = "INSERT INTO `log`(`id`, `id_hardware`, `usuario`, `pre`, `post`) 
					VALUES (NULL,'$id_hardware','$user','$pre','$post')";
					mysqli_query($connection, $sql);


				}
				else if(isset($_POST['actionButton']) AND  $_POST['actionButton'] == 'Aplicar')
				{
						$id_hardware = $_SESSION["znaleziony"]; // id_hardware
						$newItem[] = $tipo;
						$newItem[] = $ubicacion;
						$newItem[] = $nota_ubicacion;
						$newItem[] = $sn;
						$newItem[] = $puesto;
						$newItem[] = $ise;
						$newItem[] = $descripcion;
						$newItem[] = $comentario;
						$newItem[] = $fechaalta;
						$newItem[] = $fechabaja;
						$newItem[] = $causabaja;

						
						$itemBefore[] = $_SESSION['tipo'];
						$itemBefore[] = $_SESSION['ubicacion'];
						$itemBefore[] = $_SESSION['nota_ubicacion'];
						$itemBefore[] = $_SESSION['sn'];
						$itemBefore[] = $_SESSION['puesto'];
						$itemBefore[] = $_SESSION['ise'];
						$itemBefore[] = $_SESSION['descripcion'];
						$itemBefore[] = $_SESSION['comentario'];
						$itemBefore[] = $_SESSION['fechaalta'];
						$itemBefore[] = $_SESSION['fechabaja'];
						$itemBefore[] = $_SESSION['causabaja'];
						
						@$user = $_SESSION['user']; // usuario
						$pre = implode('/',$itemBefore); //pre
						$post = implode('/',$newItem); //post
						//fecha is automatically set in table in database

						$sql = "INSERT INTO `log`(`id`, `id_hardware`, `usuario`, `pre`, `post`) 
						VALUES (NULL,'$id_hardware','$user','$pre','$post')";
						
						$GLOBALS[] = null;
						
						mysqli_query($connection, $sql);
					
					
				}
				else if(isset($_GET['actionButton']) AND  $_GET['actionButton'] == 'Eliminar')
				{
						$id_hardware = $idDeletedItem; //id_hardware
						
						
							$deletedItem[] = $_GET['tipo'];
							$deletedItem[] = $_GET['ubicacion'];
							$deletedItem[] = $_GET['nota_ubicacion'];
							$deletedItem[] = $_GET['sn'];
							$deletedItem[] = $_GET['puesto'];
							$deletedItem[] = $_GET['ise'];
							$deletedItem[] = $_GET['descripcion'];
							$deletedItem[] = $_GET['comentario'];
							$deletedItem[] = $_GET['fechaalta'];
							$deletedItem[] = $_GET['fechabaja'];
							$deletedItem[] = $_GET['causabaja'];
					
					
					
						@$user = $_SESSION['user']; // usuario
						$pre = implode('/',$deletedItem); //pre
						$post =  'NULL';//post
						//fecha is automatically set in table in database
						
						$sql = "INSERT INTO `log`(`id`, `id_hardware`, `usuario`, `pre`, `post`) 
						VALUES (NULL,'$id_hardware','$user','$pre','$post')";
						mysqli_query($connection, $sql);

				}
				else if(!isset($_GET['actionButton']))
				{
					
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
									<div class="col-md-12">
										<div class="table-responsive">
											<table class="mitabla table-bordered table-striped" style="margin-bottom: 10px !important;">
												<thead>
													<tr>
														<th><a href="log.php?sort=Id&page=1">Id</a></th>
														<th><a href="log.php?sort=id_hardware&page=1">ID Hardware</a></th>
														<th><a href="log.php?sort=usuario&page=1">Usuario</a></th>
														<th><a href="log.php?sort=pre&page=1">Pre</a></th>
														<th><a href="log.php?sort=post&page=1">Post</a></th>
														<th><a href="log.php?sort=fecha&page=1">Fecha</a></th>
														<?php if($_SESSION["admin"] == 1){echo '<th></th>';}?>
													</tr>
												</thead>
												<tbody>
					<?php
						$_SESSION["results"] = 0;
						require_once "connect.php";
						include 'logTable.php';
					?>
										</div>
									</div>
								</div>
							</div>
					</body>
					<?php

				}
			}
?>