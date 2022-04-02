<div class="form-card">
	<form action='?A=processing' method='post' enctype='multipart/form-data'>
			<input type="hidden" name="proc" value=2>
		<ul class="form">
			<li><label>Email cím: <input type="email" name="email" size="26" maxlength="128" autofocus required></label></li>
			<li><label>Jelszó: <input type="text" name="pass" size="26" required><br></label></li>
			<li class="center-button"><input type='submit' value='Belépés' class="button"></li>
			<li class="center-button">Még nem regisztráltál?</li>
			<li class="center-button"><input class="button" type=button value='Regisztráció' onclick='location.href="/register"'></li>
		</ul>
	</form>
</div>

<?php
include "popup_error.php";