<html>
	<?php
		session_start();

		include "checkUser.php";
		
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
					<table class="mitabla table-bordered table-hover" style="width: 380px !important; margin-bottom: 10px !important;">
					<form name="filtr" action="filterSet.php" method="GET">
					<tr><td class="form">ID: </td><td><input type="text" id="Id" name="Id"/> </td></tr>
					<tr><td class="form">Tipo</td><td><input type="text" id="tipo" name="tipo"/></td></tr>
					<tr><td class="form">Nota Ubicacion</td><td><input type="text" id="nota_ubicacion" name="nota_ubicacion"/></td></tr>
					<tr><td class="form">SN</td><td><input type="text" id="sn" name="sn"/></td></tr>
					<tr><td class="form">Puesto</td><td><input type="text" id="puesto" name="puesto"/></td></tr>
					<tr><td class="form">ISE</td><td><input type="text" id="ise" name="ise"/></td></tr>
					<tr><td class="form">Ubicacion</td><td> Desde: <input type="text" id="ubicacionfrom" name="ubicacionfrom" size="5"/> hasta: <input type="text" id="ubicacionto" name="ubicacionto" size="5"></td></tr>
					<tr><td class="form">Fecha alta</td><td>Desde: <input type="text" id="fechaaltafrom" name="fechaaltafrom" size="5"/> hasta: <input type="text" id="fechaaltato" name="fechaaltato" size="5"/></td></tr>
					<tr><td class="form">Fecha baja</td><td>Desde: <input type="text" id="fechabajafrom" name="fechabajafrom" size="5"/> hasta: <input type="text" id="fechabajato" name="fechabajato" size="5"/></td></tr>
					</table>
					<input type="hidden" name="filterstartrow" value='0'/>
					<input type="hidden" name="page" value='1'/>
					<center><input type="submit" value="Aplicar" name="Zatwierdz"/></center></form>
					<br>
				</div>
			</div>
		</div>
		<div class = "row">
			<div class = "container">
				<div class="col-md-11">
				</div>
			</div>
		</div>	
		<!--<div class = "row">
			<div class = "container">
				<center><a href='<?php echo $_SESSION['previouspage'];?>'>Volver a la página anterior</a></center>
			</div>
		</div>-->	
	</body>
</html>