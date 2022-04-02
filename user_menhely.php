<?php

include "connect_db.php";

$query = mysqli_query($adb, "SELECT * FROM menhely WHERE id = '$_SESSION[mid]'");
$user = mysqli_fetch_array($query);
$query2 = mysqli_query($adb, "SELECT * FROM menhely_allatok WHERE menhely_id = '$_SESSION[mid]'");

echo("<div class='data-container'>");
echo("<div class='single-image'>");
echo("<img class='big-picture' alt='menhely' src='/pictures/$user[picture].jpg' loading='lazy'>");
echo("</div>");
echo("<div class='data-card'>");
echo("<ul>");
echo("<li>Név: $user[nev]</li>");
echo("<li>Leírás: $user[leiras]</li>");
echo("<li>Email cím: $user[email]</li>");
echo("<li>Telefonszám: $user[phone]</li>");
if ($user["website"] != "") echo("<li>Honlap: $user[website]</li>");
echo("<li>Cím: $user[city], $user[cim]</li>");
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
	echo("<li class='desc'>$line[description]</li>");
	echo("<li><form class='delete' action='?A=processing' method='post' enctype='multipart/form-data'>
			<input type='hidden' name='proc' value=8>
			<input type='hidden' name='delete_id' value=$line[id]>
			<input class='red-button' type='submit' value='Törlés'></form></li>");
	echo("</ul>");
	echo("</div>");
}

echo("</div>");

mysqli_close($adb);