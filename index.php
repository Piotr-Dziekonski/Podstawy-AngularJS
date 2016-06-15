<!DOCTYPE html>
<html>
	<?php
		session_start();
		if(@$_GET["logout"] == true)
		{
			$_SESSION['login'] = 0;
			$_SESSION['haslo'] = 0;
			$_SESSION["zalogowano"] = 0;
			$_SESSION["ileKoszyk"] = 0;
			$_SESSION['koszyk'] = null;
			$_SESSION['suma'] = 0;
		}
	?>
			<head>
				<link rel="stylesheet" href="css/bootstrap.min.css">
				<link rel="stylesheet" href="css/style.css">
				<script src="http://code.jquery.com/jquery.js" type="text/javascript"></script>
				<script src="js/bootstrap.min.js" type="text/javascript"></script>
				<script src="js/dropdown.js" type="text/javascript"></script>
				<script src="js/zamowienie.js" type="text/javascript"></script>
				<meta http-equiv="content-Type" content="text/html; charset=utf-8">
				<title>Sklep</title>
			</head>
		<body 
		<?php 
		if(@$_GET['zamowienie'] == 1)
			{
				echo 'onload="zamowienie()"';
			}
			?>
			>
		<div class="container-fluid">
		  <nav class="navbar-fixed-top navbar-default">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">SKLEP KOMPUTEROWY</a>
			</div>
			
			<div class="collapse navbar-collapse js-navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown mega-dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Konsole <span class="caret"></span></a>				
						<ul class="dropdown-menu mega-dropdown-menu">
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">Polecane</li>                            
									<div id="menCollection" class="carousel slide" data-ride="carousel">
									  <div class="carousel-inner">
										<div class="item active">
											<img src="img/fallout.png" class="img-responsive" alt="product 1">
											<h4><small>Fallout 4</small></h4>                                        
											<button class="btn btn-primary" type="button">119,99 zł</button><a href="koszyk.php?id=1&dodaj=1"><button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-shopping-cart"></span> Dodaj do koszyka</button></a>   
										</div><!-- End Item -->
										<div class="item">
											<img src="img/fifa16mini.png" class="img-responsive" alt="product 2">
											<h4><small>Fifa 16</small></h4>                                        
											<button class="btn btn-primary" type="button">119,99 zł</button><a href="koszyk.php?id=2&dodaj=1"><button class="btn btn-default" type="button"><span class="glyphicon glyphicon-shopping-cart"></span> Dodaj do koszyka</button></a>      
										</div><!-- End Item -->
										<div class="item">
											<img src="img/battlefront.png" class="img-responsive" alt="product 3">
											<h4><small>Star Wars Battlefront</small></h4>                                        
											<button class="btn btn-primary" type="button">159,99 zł</button><a href="koszyk.php?id=3&dodaj=1"> <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-shopping-cart"></span> Dodaj do koszyka</button></a>    
										</div><!-- End Item -->                                
									  </div><!-- End Carousel Inner -->
									  <!-- Controls -->
									  <a class="left carousel-control" href="#menCollection" role="button" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									  </a>
									  <a class="right carousel-control" href="#menCollection" role="button" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									  </a>
									</div><!-- /.carousel -->
									<li class="divider"></li>
									<li><a href="../index.php?wyniki=1&rodzaj=konsoloweall">Wyświetl wszystkie gry <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">Kategorie</li>
									<li><a href="../index.php?wyniki=1&gatunek=Przygodowe&rodzaj=konsolowe">Przygodowe</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=Wyscigowe&rodzaj=konsolowe">Wyścigowe</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=RPG&rodzaj=konsolowe">RPG</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=Sportowe&rodzaj=konsolowe">Sportowe</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=Dladzieci&rodzaj=konsolowe">Dla dzieci</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=Akcji&rodzaj=konsolowe">Akcji</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=DLC&rodzaj=konsolowe">DLC</a></li>
									<li class="divider"></li>
									<li class="dropdown-header">Konsole</li>
									<li><a href="../index.php?wyniki=1&rodzaj=XBOX360">Xbox 360</a></li>
									<li><a href="../index.php?wyniki=1&rodzaj=XBOXONE">Xbox One</a></li>
									<li><a href="../index.php?wyniki=1&rodzaj=PS4">Play Station 4</a></li>                            
									<li><a href="../index.php?wyniki=1&rodzaj=PS3">Play Station 3</a></li>			
									<li><a href="../index.php?wyniki=1&rodzaj=WII">Nintendo Wii</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">Premiery</li>
									<li><a href="../index.php?wyniki=1&rodzaj=tydzienKon">Ten tydzień</a></li>
									<li><a href="../index.php?wyniki=1&rodzaj=miesiacKon">Ten miesiąc</a></li>
									<li><a href="./index.php?wyniki=1&rodzaj=rokKon">Ten rok</a></li>                           										
								</ul>
							</li>
							<li class="col-sm-3">
								
							</li>
						</ul>				
					</li>
					<li class="dropdown mega-dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">PC <span class="caret"></span></a>				
						<ul class="dropdown-menu mega-dropdown-menu">
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">Kategorie</li>
									<li><a href="../index.php?wyniki=1&gatunek=Przygodowe&rodzaj=pc">Przygodowe</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=Wyscigowe&rodzaj=pc">Wyścigowe</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=Akcji&rodzaj=pc">Akcji</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=RPG&rodzaj=pc">RPG</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=Sportowe&rodzaj=pc">Sportowe</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=Dladzieci&rodzaj=pc">Dla dzieci</a></li>
									<li><a href="../index.php?wyniki=1&gatunek=DLC&rodzaj=pc">DLC</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">Premiery</li>
									<li><a href="../index.php?wyniki=1&rodzaj=tydzienPc">Ten tydzień</a></li>
									<li><a href="../index.php?wyniki=1&rodzaj=miesiacPc">Ten miesiąc</a></li>
									<li><a href="../index.php?wyniki=1&rodzaj=rokPc">Ten rok</a></li>						
								</ul>
							</li>
							<li class="col-sm-3">
								
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">Polecane</li>                            
									<div id="womenCollection" class="carousel slide" data-ride="carousel">
									  <div class="carousel-inner">
										<div class="item active">
											<img src="img/fallout.png" class="img-responsive" alt="product 1">
											<h4><small>Fallout 4</small></h4>                                        
											<button class="btn btn-primary" type="button">119,99 zł</button><a href="koszyk.php?id=1&dodaj=1"><button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-shopping-cart"></span> Dodaj do koszyka</button></a>   
										</div><!-- End Item -->
										<div class="item">
											<img src="img/fifa16mini.png" class="img-responsive" alt="product 2">
											<h4><small>Fifa 16</small></h4>                                        
											<button class="btn btn-primary" type="button">119,99 zł</button><a href="koszyk.php?id=2&dodaj=1"><button class="btn btn-default" type="button"><span class="glyphicon glyphicon-shopping-cart"></span> Dodaj do koszyka</button></a>      
										</div><!-- End Item -->
										<div class="item">
											<img src="img/battlefront.png" class="img-responsive" alt="product 3">
											<h4><small>Star Wars Battlefront</small></h4>                                        
											<button class="btn btn-primary" type="button">159,99 zł</button><a href="koszyk.php?id=3&dodaj=1"> <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-shopping-cart"></span> Dodaj do koszyka</button></a> 
										</div><!-- End Item -->                                
									  </div><!-- End Carousel Inner -->
									  <!-- Controls -->
									  <a class="left carousel-control" href="#womenCollection" role="button" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									  </a>
									  <a class="right carousel-control" href="#womenCollection" role="button" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									  </a>
									</div><!-- /.carousel -->
									<li class="divider"></li>
									<li><a href="../index.php?wyniki=1&rodzaj=pcall">Wyświetl wszystkie gry <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
								</ul>
							</li>
						</ul>				
					</li>
					
				</ul>
				<?php
				if(@$_SESSION["zalogowano"] != 1)					
						{
							echo 	'<form class="navbar-form navbar-right" style="padding-left:0px;" action="index.php?rejestracja=1" method="post">';
							echo		'<input class="btn btn-default" type="submit" value="Załóż konto"></button>';
							echo	'</form>';
							echo 	'<form class="navbar-form navbar-right" style="padding-right:0px;" action="loguj.php" method="post">';
							echo		'<div class="form-group">';
							echo			'<input type="text" class="form-control" name="username" placeholder="Username">';
							echo		'</div>';
							echo		'<div class="form-group">';
							echo			'<input type="password" class="form-control" name="password" placeholder="Password">';
							echo		'</div>';
							echo		'<input type="submit" class="btn btn-default" value="Zaloguj"></button>';
							echo	'</form>';

						}
						else
						{
							
							echo	'<ul class="nav navbar-nav navbar-right">';
							echo 	"<li><a id='witaj'>Witaj ".$_SESSION['user']."!</a></li>";
							echo		'<li class="dropdown">';
							echo			'<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Moje konto <span class="caret"></span></a>';
							echo			'<ul class="dropdown-menu" role="menu">';
							//echo				'<li><a href="#"></a></li>';
							//echo				'<li><a href="#"></a></li>';
							//echo				'<li><a href="#"></a></li>';
							//echo				'<li class="divider"></li>';
							echo				'<li><a href="../index.php?logout=true">Wyloguj</a></li>';
							echo			'</ul>';
							echo		'</li>';
							echo		'<li style="margin-right: 10px;"><a href="index.php?koszyk=1"><span class="glyphicon glyphicon-shopping-cart"></span> Mój koszyk ('. $_SESSION["ileKoszyk"].')</a></li>';
							echo	'</ul>';
						}
				?>
			</div><!-- /.nav-collapse -->
		  </nav>
		</div>

		<?php
			if(@$_GET['anonymous'] == 1)
			{
				echo '<div class="col-md-8 col-md-offset-2">';
				echo '	<div class="row">';
				echo '	</div>';
				echo '	<div class="row">';
				echo '		<div id="glownaTresc" class="col-md-12">';
				echo '			<div class="row">';
				echo '				Musisz się zalogować';
				echo '			</div>';
				echo '		</div>';
				echo '	</div>';
				echo '</div>';
			}
			else
			{
				if(@$_GET["wyniki"] != 1)
				{
					if(@$_GET["rejestracja"] == 1)
					{
						include 'rejestracja.php';
					}
					else if(@$_SESSION['zalogowano'] != 0)
					{
						if(@$_GET["koszyk"] == 1)
						{		
								
								echo '<div class="col-md-8 col-md-offset-2">';
								echo '	<div class="row">';
								echo '	</div>';
								echo '	<div class="row">';
								echo '		<div id="glownaTresc" class="col-md-12">';
								echo '			<h3>Twój koszyk</h3>';
								echo '			<table>';
								echo '				<thead>';
								echo '					<tr>';
								echo '						<th></th>';
								echo '						<th class="titletd">Tytuł</th>';
								echo '						<th class="pricetd">Cena</th>';
								echo '						<th></th>';
								echo '					</tr>';
								echo '				</thead>';
								echo '				<tbody>';
								if($_SESSION['koszyk'] != 0)
								{
									foreach($_SESSION['koszyk'] as $key=>$val) 
									{
										echo '			<tr>';
										echo '				<td class="imgtd"><img class="koszykImg" src="'.$val['obrazek'].'"/></td>';
										echo '				<td class="titletd">'.$val['tytul'].'</td>';
										echo '				<td class="pricetd">'.$val['cena'].'</td>';
										echo '				<td class="buttontd"><a href="koszyk.php?ARRAY='.$key.'&id='.$val['id'].'&usun=1"> <button class="btn btn-default" type="button">Usun</button></a></td>';
										echo '			</tr>';
										
									}
								}
								echo '				<tbody>';
								echo '			</table>';
								echo '<div style="font-size:1.6em; float:left; margin-top:15px;">SUMA: '.$_SESSION['suma'].'zł</div>';
								if($_SESSION['ileKoszyk'] > 0)
								{
									echo '			<a href="../kasa.php"><button class="btn btn-default" style="float:right; margin-top: 15px; font-size: 1.5em; background-color:rgba(255, 135, 0, 0.79);" type="button">Złóż zamówienie</button></a>';
								}
								echo '		</div>';
								echo '	</div>';
								echo '</div>';
						}
						else if(@$_GET['rejestracja'] == 1)
						{
							include 'rejestracja.php';
						}
						else
						{
							include 'glownyView.php';
						}
						
					}
					else
					{


							include 'glownyView.php';

								
					}
				}	
				else
				{
					
					echo '<div class="col-md-8 col-md-offset-2">';
					echo '	<div class="row">';
					echo '	</div>';
					echo '	<div class="row">';
					echo '		<div id="glownaTresc" class="col-md-12">';
					echo '			<h3>Wyniki wyszukiwania</h3>';
					include "dane.php";
					
					echo '		</div>';
					echo '	</div>';
					echo '</div>';
				}
			}
			
			
			
					
			
			
			
		
		?>
		
		
	
		</body>
</html>
