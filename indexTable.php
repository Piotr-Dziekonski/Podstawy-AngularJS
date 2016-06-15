<?php
								$connection = @new mysqli($servername,$user,$password,$database);
						
								if($connection -> connect_errno!=0)
								{
									echo "Error: ".$connection->connect_errno." Opis :".$connection->connect_error;
								}
								else
								{
									
									$sql = "SELECT * FROM hardware";
									$sortType = 'Id';
									
									

									@$_SESSION['sort'] = $_GET['sort'];
									$answer = mysqli_query($connection, $sql);
									$count =  mysqli_num_rows($answer);
									$_SESSION["numofrows"] = $count;
									$maxpage = ceil($count / 10);
									$_SESSION['maxpage'] = $maxpage;
									$_SESSION['previouspage'] = $_SERVER['REQUEST_URI'];
									
									
									if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow']))
									{
									  $startrow = 0;
									} 
									else 
									{
										$startrow = (int)$_GET['startrow'];
									  
										if(isset($_GET['page']))
										{
											if($_GET['page'] <=0)
											{
												$startrow = 0;
											}
											else if($_GET['page'] >= $maxpage)
											{
												$startrow = (int)($maxpage - 1) * 10;
											}
											else
											{
												$startrow = (int)($_GET['page'] - 1) * 10;
											}
										}
									}
									
									$_SESSION['currentstartrow'] = $startrow;
									
									$sql = "SELECT * FROM hardware ";
									
									if(isset($_GET['sort']))
									{
										if ($_GET['sort'] == 'Id')
										{
											$sql = $sql." ORDER BY Id";
										}
										else if ($_GET['sort'] == 'Tipo')
										{
											$sql = $sql." ORDER BY Tipo";
										}
										else if ($_GET['sort'] == 'Ubicacion')
										{
											$sql .= " ORDER BY Ubicacion";
										}
										else if($_GET['sort'] == 'Nota_Ubicacion')
										{
											$sql .= " ORDER BY Nota_Ubicacion";
										}
										else if($_GET['sort'] == 'SN')
										{
											$sql .= " ORDER BY SN";
										}
										else if($_GET['sort'] == 'PUESTO')
										{
											$sql .= " ORDER BY PUESTO";
										}
										else if($_GET['sort'] == 'ISE')
										{
											$sql .= " ORDER BY ISE";
										}
										else if($_GET['sort'] == 'descripcion')
										{
											$sql .= " ORDER BY descripcion";
										}
										else if($_GET['sort'] == 'Comentario')
										{
											$sql .= " ORDER BY Comentario";
										}
										else if($_GET['sort'] == 'FechaAlta')
										{
											$sql .= " ORDER BY FechaAlta";
										}
										else if($_GET['sort'] == 'FechaBaja')
										{
											$sql .= " ORDER BY FechaBaja";
										}
										else if($_GET['sort'] == 'CausaBaja')
										{
											$sql .= " ORDER BY CausaBaja";
										}
										
									}
									$sql = $sql." LIMIT $startrow, 10";
								}
									if($result = @$connection->query($sql))
									{
										
									
										while($row = $result->fetch_assoc())
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
										
											
											echo " <tr>";
											echo " <td class='right'>";
											echo " $ID";
											echo " </td>";
											echo " <td>";
											echo " $tipo";
											echo " </td>";
											echo " <td  class='right'> ";
											echo " $ubicacion";
											echo " </td>";
											echo " <td  class='right'>";
											echo " $nota_ubicacion";
											echo " </td>";
											echo " <td>";
											echo " $sn";
											echo " </td>";
											echo " <td class='right'>";
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
											echo " <td  class='right'>";
											echo " $fechaalta";
											echo " </td>";
											echo " <td  class='right'>";
											echo " $fechabaja";
											echo " </td>";
											echo " <td>";
											echo " $causabaja";
											echo " </td>";
											if($_SESSION["admin"] == 1)
											{
												echo " <td align='center'>
												<div class='btn-group'>
													<button type='button' class='btn dropdown-toggle' data-toggle='dropdown'>
														<span class='caret'></span>
													</button>
													<ul class='dropdown-menu' role='menu'>
													<li>
														<a href='selectItem.php?tempid=".$ID."'>Editar</a>
														<a href='deleteItem.php?actionButton=Eliminar&tempid=".$ID."&tipo=".$tipo."
														&ubicacion=".$ubicacion."&nota_ubicacion=".$nota_ubicacion."&sn".$sn."&puesto=".$puesto."&ise=".$ise."&descripcion=".$descripcion."
														&comentario=".$comentario."&fechaalta=".$fechaalta."&fechabaja=".$fechabaja."&causabaja=".$causabaja."'>Eliminar</a>
													</li>
													</ul>
												</div>
												</td>";
											}
											echo "</tr>";
										}
										
										
										echo "</tbody>";
										echo '<tfoot><tr><th colspan = "14">';
										$prev = $startrow - 10;
										$page = (int)$startrow /10 + 1;
										
										
										if ($prev >= 0)
										{
											echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.($page-1).'&sort='.$sortType.'&startrow='.$prev.'">Anterior </a>';
										}
										if(@(!($_GET['page'] == 1)))
										{
											if(@!($_GET['page'] == ""))
											{
												if(!($_GET['page'] < 1))
												{
													echo "<a href='".$_SERVER['PHP_SELF']."?page=1&startrow=0&sort=".$sortType."'>Primero </a>";
												}
											}
										}
										if(@!($_GET['page'] >= $maxpage))
										{
											echo "<a href='".$_SERVER['PHP_SELF']."?page=".$maxpage."&sort=".$sortType."&startrow=0'>Último </a>";
										}
										if(@!($startrow >= $count - 10))
										{
											echo "<a href='".$_SERVER['PHP_SELF']."?page=".($page+1)."&startrow=0&sort=".$sortType."'>Siguiente </a>";
										}
										echo "<form name='formpage' action='".$_SERVER['PHP_SELF']."' method='GET'>
												<input type = 'text' name='page' size='3' value='".$page."'/> de ".$maxpage."
												<input type = 'hidden' name='startrow' value='".$startrow."'/>
												<input type = 'submit' value= 'GO'/>
												</form></th></tr></tfoot>";
										echo "</table>";
									
									}
								
							
?>