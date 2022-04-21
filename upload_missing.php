<div class="form-card">
	<form action='?A=processing' method='post' enctype='multipart/form-data'>
		<input type="hidden" name="proc" value=4>
		<ul class="form">
			<li><label>Név: <input type="text" name="name" size="38" maxlength="32" placeholder="Max 32 karakter" autofocus required></label></li>
			<li><label>Rövid leírás: <textarea name="desc" cols="38" rows="10" maxlength="450" placeholder="Max 450 karakter"></textarea></label></li>
			<li><label>Eltűnés dátuma:<input type="date" name="miss_date" size="26" required></label></li>
			<li><label>Kép: <input type='file' name='pic' size="38" accept="image/jpeg" required><br></label></li>
			<li class="center-button"><input class="button" type='submit' value='Feltöltés'></li>
		</ul>
	</form>
</div>