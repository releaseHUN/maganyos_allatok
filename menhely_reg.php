<div class="form-card">
	<form action='?A=processing' method='post' enctype='multipart/form-data'>
			<input type="hidden" name="proc" value=3>
		<ul class="form">
			<li><label>Menhely név: <input type="text" name="menhelyname" size="38" maxlength="128" placeholder="Max 128 karakter" autofocus required></label></li>
			<li><label>Email cím: <input type="email" name="email" size="38" maxlength="128" placeholder="valami@valami.hu" required></label></li>
			<li><label>Jelszó: <input type="text" name="pass" size="38" minlength="8" placeholder="Minimum 8 karakter" required></label></li>
			<li><label>Jelszó újra: <input type="text" name="pass2" size="38" required></label></li>
			<li><label>Telefonszám: <input type="tel" name="phone" size="38" placeholder="06(30)123-4678" required></label></li>
			<li><label>Rövid leírás: <textarea name="desc" cols="38" rows="5" maxlength="450" placeholder="Max 450 karakter"></textarea></label></li>
			<li><label>Weboldal: <input type="text" name="website" maxlength="128" size="38" placeholder="A menhely weblapja ha van"></label></li>
			<li><label>Város: <input type="text" name="city" maxlength="30" size="38" required></label></li>
			<li><label>Cím: <input type="text" name="cim" maxlength="128" size="38" required></label></li>
			<li><label>Kép: <input type="file" name="pic" accept="image/jpeg" required></label></li>
			<li class="center-button"><input class="button" type='submit' value='Regisztrálok'></li>
			<li class="center-button">Már regisztráltál?</li>
			<li class="center-button"><input class="button" type=button value='Belépés' onclick='location.href="/login"'></li>
			<li class="center-button">Felhasználóként regisztrálnál?</li>
			<li class="center-button"><input class="button" type=button value='Felhasználó regisztráció' onclick='location.href="/register"'></li>
		</ul>
	</form>
</div>

<?php
include "popup_error.php";