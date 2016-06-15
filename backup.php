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
				<br>
					<a href="copyInvTable.php"><button>Crear una copia de seguridad del inventario mesa.</button></a><br><br>
					<a href="copyLogTable.php"><button>Copia de seguridad de la tabla de log.</button></a>
				</div>
			</div>
		</div>
		</body>