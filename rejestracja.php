<div class="row" id="rejestracja">
	<div class="row" id="trescRej">
		<?php
			if(@$_GET['err']==1)
			{
				echo "<p style='color:red; margin-top:15px;'>Użytkownik o takim loginie już istnieje!</p>";
			}
		?>
		<form action="addUser.php" method="post">
			<table id="rejTab">
				<tr>
					<td>
						<h3>Rejestracja</h3>
					</td>
				</tr>
				<tr>
					<td>
						Imię
					</td>
					<td>
					<input type="text" id="imie" name="imie" required/></br>
					</td>
				</tr>
				<tr>
					<td>
						Nazwisko
					</td>
					<td>
					<input type="text" id="nazwisko" name="nazwisko" required/></br>
					</td>
				</tr>
				<tr>
					<td>
						Login
					</td>
					<td>
					<input type="text" id="login" name="login" required/></br>
					</td>
				</tr>
				<tr>
					<td>
						Haslo
					</td>
					<td>
					<input type="password" id="haslo" name="haslo" required/></br>
					</td>
				</tr>
				<tr>
					<td>
						Ulica
					</td>
					<td>
					<input type="text" id="ulica" name="ulica" required/></br>
					</td>
				</tr>
				<tr>
					<td>
						Numer domu
					</td>
					<td>
					<input type="text" id="nrDomu" name="nrDomu" required/></br>
					</td>
				</tr>
				<tr>
					<td>
						Numer mieszkania
					</td>
					<td>
					<input type="text" id="nrMieszkania" name="nrMieszkania" required/></br>
					</td>
				</tr>
				<tr>
					<td>
						Miasto
					</td>
					<td>
					<input type="text" id="miasto" name="miasto" required/></br>
					</td>
				</tr>
				<tr>
					<td>
						Email
					</td>
					<td>
					<input type="text" id="email" name="email" required/></br>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Zatwierdz" style="margin-top:5px;" name="zatwierdz"/>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>