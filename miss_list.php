<?php

include "connect_db.php";

$query = mysqli_query($adb, "SELECT * FROM allatok WHERE upload_time >= DATE_SUB(CURDATE(), INTERVAL 60 DAY) ORDER BY miss_date DESC");

echo("<div class='list_container'>");

while ($line = mysqli_fetch_array($query)) {
	echo("<a href='/elveszettallatadat/$line[id]'>");
	echo("<div class='card'>");
	echo("<ul>");
	echo("<li><h2>$line[name]</h2></li>");
	echo("<li><img alt='állat' src='/small_pictures/$line[picture].jpg' loading='lazy'></li>");
	echo("<li>Eltűnt: $line[miss_date]</li>");
	echo("<li class='desc'>$line[description]</li>");
	echo("</ul>");
	echo("</div>");
	echo("</a>");
}

echo("</div>");
