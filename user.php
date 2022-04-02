<?php

include "connect_db.php";

$query = mysqli_query($adb, "SELECT * FROM users WHERE id = $_SESSION[uid]");
$user = mysqli_fetch_array($query);
$query2 = mysqli_query($adb, "SELECT * FROM allatok WHERE uploader_id = $_SESSION[uid]");

echo("<div class='data-container'>");

echo("<div class='data-card'>");
echo("<ul>");
echo("<li>Felhasználónév: $user[username]</li>");
echo("<li>Email cím: $user[email]</li>");
echo("<li>Telefonszám: $user[phone]</li>");
echo("<li><form class='delete' action='?A=processing' method='post' enctype='multipart/form-data'>
			<input type='hidden' name='proc' value=9>
			<input class='red-button' type='submit' value='Kilépés'></form></li>");
echo("</ul>");
echo("</div>");

while ($line = mysqli_fetch_array($query2)) {
	echo("<div class='card user_upload'>");
	echo("<ul>");
	echo("<li><h2>$line[name]</h2></li>");
	echo("<li><img alt='állat' src='/small_pictures/$line[picture].jpg' loading='lazy'></li>");
	echo("<li>Eltűnt: $line[miss_date]</li>");
	echo("<li class='desc'>$line[description]</li>");
	echo("<li><form class='delete' action='?A=processing' method='post' enctype='multipart/form-data'>
			<input type='hidden' name='proc' value=7>
			<input type='hidden' name='delete_id' value=$line[id]>
			<input class='red-button' type='submit' value='Törlés'></form></li>");
	echo("</ul>");
	echo("</div>");
}

echo("</div>");

mysqli_close($adb);