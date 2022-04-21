<?php

include "connect_db.php";

$query = mysqli_query($adb, "SELECT * FROM menhely");

echo("<div class='list_container'>");

while ($line = mysqli_fetch_array($query)) {
	echo("<a href='/menhely/$line[id]'>");
	echo("<div class='card'>");
	echo("<ul>");
	echo("<li>$line[nev]</li>");
	echo("<li><img alt='állat' src='/small_pictures/$line[picture].jpg' loading='lazy'></li>");
	echo("<li>$line[city]</li>");
	echo("<li class='desc'>$line[leiras]</li>");
	echo("<li></li>");
	echo("</ul>");
	echo("</div>");
	echo("</a>");
}

echo("</div>");

mysqli_close($adb);