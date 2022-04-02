<div class="form-card">
	<form action='?A=processing' method='post' enctype='multipart/form-data'>
			<input type="hidden" name="proc" value=1>
		<ul class="form">
			<li><label>Név: <input type="text" name="username" maxlength="128" size="26" placeholder="Max 128 karakter" autofocus required></label></li>
			<li><label>Email cím: <input type="email" name="email" maxlength="128" size="26" placeholder="valami@valami.hu" required></label></li>
			<li><label>Jelszó: <input type="text" name="pass" size="26" minlength="8" placeholder="Minimum 8 karakter" required></label></li>
			<li><label>Jelszó újra: <input type="text" name="pass2" size="26" required></label></li>
			<li><label>Telefonszám: <input type="tel" name="phone" size="26" placeholder="06(30)123-4678" required></label></li>
			<li class="center-button"><input class="button" type='submit' size="26" value='Regisztrálok'></li>
			<li class="center-button">Már regisztráltál?</li>
			<li class="center-button"><input class="button" type=button value='Belépés' onclick='location.href="/login"'></li>
			<li class="center-button">Menhelyet regisztrálnál?</li>
			<li class="center-button"><input class="button" type=button value='Menhely regisztráció' onclick='location.href="/menhelyreg"'></li>
		</ul>
	</form>
</div>

<?php
include "popup_error.php";