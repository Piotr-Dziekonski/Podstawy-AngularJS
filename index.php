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
											<th><a href="index.php?sort=Id&page=1">Id</a></th>
											<th><a href="index.php?sort=Tipo&page=1">Tipo</a></th>
											<th><a href="index.php?sort=Ubicacion&page=1">Ubicacion</a></th>
											<th><a href="index.php?sort=Nota_Ubicacion&page=1">Nota ubicacion</a></th>
											<th><a href="index.php?sort=SN&page=1">Sn</a></th>
											<th><a href="index.php?sort=PUESTO&page=1">Puesto</a></th>
											<th><a href="index.php?sort=ISE&page=1">ISE</a></th>
											<th><a href="index.php?sort=descripcion&page=1">Descripcion</a></th>
											<th><a href="index.php?sort=Comentario&page=1">Comentario</a></th>
											<th><a href="index.php?sort=FechaAlta&page=1">Fecha alta</a></th>
											<th><a href="index.php?sort=FechaBaja&page=1">Fecha baja</a></th>
											<th><a href="index.php?sort=CausaBaja&page=1">Causa baja</a></th>
											<?php
											if($_SESSION["admin"] == 1)
											{
												echo '<th></th>';
											}
											?>
										</tr>
									</thead>
									<tbody>
							<?php
							$_SESSION["results"] = 0;
								require_once "connect.php";
								
								include 'indexTable.php';

							?>
							</div>
						
					</div>
				</div>
		</body>
</html>
