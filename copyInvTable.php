<?php 
				include "checkUser.php";
				if(empty($_SESSION['admin']))
				{
					header('Location: index.php');
				}

				date_default_timezone_set('Europe/Berlin');
				$date = date('m/d/Y h:i:s a ', time());
				$nameWithDate = 'Content-Disposition: attachment; filename='.$date.'inventario.csv';
			
				// output headers so that the file is downloaded rather than displayed
				header('Content-Type: text/csv; charset=utf-8');
				header($nameWithDate);

				// create a file pointer connected to the output stream
				$output = fopen('php://output', 'w');

				// output the column headings
				fputcsv($output, array("id","Tipo","Ubicacion","Nota_Ubicacion","SN","PUESTO","ISE","descripcion","Comentario","FechaAlta","FechaBaja","CausaBaja"));

				// fetch the data
				mysql_connect('localhost', 'root', '');
				mysql_select_db('jaime');
				$rows = mysql_query('SELECT `id`,`Tipo`,`Ubicacion`,`Nota_Ubicacion`,`SN`,`PUESTO`,`ISE`,`descripcion`,`Comentario`,`FechaAlta`,`FechaBaja`,`CausaBaja` FROM hardware');

				// loop over the rows, outputting them
				while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
				
				
				$connection->close();
				$location = "Location: backup.php";

?>