<html>
	<?php
		session_start();
		include "checkUser.php";
			if(empty($_SESSION['admin']))
			{
				header('Location: index.php');
			}
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
									<li>
										<a href="newItem.php">Insertar</a>
									</li>
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
								echo '<form action="addItem.php" method="POST">
									<table class = "mitabla table-bordered table-hover" style="width: auto !important">
										<tr>
											<td class="form">
												Tipo
											</td>
											<td class="formtext">
											<input type="text" id="tipo" name="tipo"/></br>
											</td>
										</tr>
										<tr>
											<td class="form">
												Ubicacion
											</td>
											<td  class="formtext">
											<input type="text" id="ubicacion" name="ubicacion"/></br>
											</td>
										</tr>
										<tr>
											<td class="form">
												Nota ubicacion
											</td>
											<td class="formtext">
											<input type="text" id="nota_ubicacion" name="nota_ubicacion"/></br>
											</td>
										<tr>
											<td class="form">
												SN
											</td>
											<td  class="formtext">
											<input type="text" id="sn" name="sn"/></br>
											</td>
										</tr>
										<tr>
											<td class="form">
												Puesto
											</td>
											<td class="formtext">
											<input type="text" id="puesto" name="puesto"/></br>
											</td>
										</tr>
										<tr>
											<td class="form">
												ISE
											</td>
											<td class="formtext">
											<input type="text" id="ise" name="ise"/></br>
											</td>
										</tr>
										<tr>
											<td class="form">
												Descripcion
											</td>
											<td class="formtext">
											<input type="text" id="descripcion" name="descripcion"/></br>
											</td>
										</tr>
										<tr>
											<td class="form">
												Comentario
											</td>
											<td class="formtext">
											<input type="text" id="comentario" name="comentario"/></br>
											</td>
										</tr>
										<tr>
											<td class="form">
												Fecha alta
											</td>
											<td class="formtext">
											<input type="text" id="fechaalta" name="fechaalta"/></br>
											</td>
										</tr>
										<tr>
											<td class="form">
												Fecha baja
											</td>
											<td class="formtext">
											<input type="text" id="fechabaja" name="fechabaja"/></br>
											</td>
										</tr>
										<tr>
											<td class="form">
												Causa baja
											</td>
											<td class="formtext">
											<input type="text" id="causabaja" name="causabaja"/></br>
											</td>
										</tr>
									</table>
									<center><input type="submit" value="Insertar" name="actionButton"/></center>
									</form>';

					
					
						?>
						
					</div>
				</div>
				<div class = "row">
					<div class = "container">
						<div class="col-md-11">
						</div>
					</div>
				</div>
	</body>
</html>