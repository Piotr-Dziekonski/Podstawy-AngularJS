<?php 
				include "checkUser.php";
				if(empty($_SESSION['admin']))
				{
					header('Location: index.php');
				}
				
				date_default_timezone_set('Europe/Berlin');
				$date = date('m/d/Y h:i:s a ', time());
				$nameWithDate = 'Content-Disposition: attachment; filename='.$date.'log.csv';

				// output headers so that the file is downloaded rather than displayed
				header('Content-Type: text/csv; charset=utf-8');
				header($nameWithDate);
				
				// create a file pointer connected to the output stream
				$output = fopen('php://output', 'w');

				// output the column headings
				fputcsv($output, array('id', 'id_hardware', 'usuario', 'pre', 'post', 'fecha'));

				// fetch the data
				mysql_connect('localhost', 'root', '');
				mysql_select_db('jaime');
				$rows = mysql_query('SELECT `id`,`id_hardware`,`usuario`,`pre`,`post`,`fecha` FROM log');

				// loop over the rows, outputting them
				while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
				
				
				$location = "Location: backup.php";

?>