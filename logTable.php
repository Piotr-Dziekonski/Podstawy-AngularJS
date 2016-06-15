<?php
								$connection = @new mysqli($servername,$user,$password,$database);
						
								if($connection -> connect_errno!=0)
								{
									echo "Error: ".$connection->connect_errno." Opis :".$connection->connect_error;
								}
								else
								{
									
									$sql = "SELECT * FROM log ";
									$sortType = 'Id';

									@$_SESSION['sort'] = $_GET['sort'];
									$answer = mysqli_query($connection, $sql);
									$count =  mysqli_num_rows($answer);
									$_SESSION["numofrowslog"] = $count;
									$maxpagelog = ceil($count / 10);
									$_SESSION['maxpagelog'] = $maxpagelog;
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
											else if($_GET['page'] >= $maxpagelog)
											{
												$startrow = (int)($maxpagelog - 1) * 10;
											}
											else
											{
												$startrow = (int)($_GET['page'] - 1) * 10;
											}
										}
									}
									
									$_SESSION['currentstartrowlog'] = $startrow;
									
									
									
									if(isset($_GET['sort']))
									{
										$sortType = $_GET['sort'];
										if ($_GET['sort'] == 'Id')
										{
											$sql = $sql." ORDER BY id";
										}
										else if ($_GET['sort'] == 'id_hardware')
										{
											$sql = $sql." ORDER BY id_hardware";
										}
										else if ($_GET['sort'] == 'usuario')
										{
											$sql .= " ORDER BY usuario";
										}
										else if($_GET['sort'] == 'pre')
										{
											$sql .= " ORDER BY pre";
										}
										else if($_GET['sort'] == 'post')
										{
											$sql .= " ORDER BY post";
										}
									}
										
								
									$sql = $sql." LIMIT $startrow, 10";
								}
								
									if($result = @$connection->query($sql))
									{	

										while($row = $result->fetch_assoc())
										{
											$ID = $row["id"];
											$id_hardware = $row["id_hardware"];
											$usuario = $row["usuario"];
											$pre = $row["pre"];
											$post = $row["post"];
											$fecha = $row["fecha"];
										
											echo " <tr>";
											echo " <td align=right>";
											echo " $ID";
											echo " </td>";
											echo " <td align=right>";
											echo " $id_hardware";
											echo " </td>";
											echo " <td> ";
											echo " $usuario";
											echo " </td>";
											echo " <td>";
											echo " $pre";
											echo " </td>";
											echo " <td>";
											echo " $post";
											echo " </td>";
											echo " <td>";
											echo " $fecha";
											echo " </td>";
											//echo "</tr>";
											if($_SESSION["admin"] == 1)
											{
												echo " <td align='center'>
															<div class='btn-group'>
																<button type='button' class='btn dropdown-toggle' data-toggle='dropdown'>
																	<span class='caret'></span>
																</button>
																<ul class='dropdown-menu' role='menu'>
																	<li>
																		<a href='deleteItem.php?actionButton=Eliminar&tempid=".$ID."&log=yes&id_hardware=".$id_hardware."
																		&usuario=".$usuario."&pre=".$pre."&post".$post."&fecha=".$fecha."'>Eliminar</a>
																	</li>
																</ul>
															</div>
														</td>
													</tr>";
											}
										
											
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
										if(@!($_GET['page'] >= $maxpagelog))
										{
											echo "<a href='".$_SERVER['PHP_SELF']."?page=".$maxpagelog."&sort=".$sortType."&startrow=0'>Último </a>";
										}
										if(@!($startrow >= $count - 10))
										{
											echo "<a href='".$_SERVER['PHP_SELF']."?page=".($page+1)."&startrow=0&sort=".$sortType."'>Siguiente </a>";
										}
										echo "<form name='formpage' action='".$_SERVER['PHP_SELF']."' method='GET'>
												<input type = 'text' name='page' size='3' value='".$page."'/> de ".$maxpagelog."
												<input type = 'hidden' name='startrow' value='".$startrow."'/>
												<input type = 'submit' value= 'GO'/>
												</form></th></tr></tfoot>";
										echo "</table>";
									
									}
								
								
?>