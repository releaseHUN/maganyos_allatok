<?php

include "connect_db.php";

$query = mysqli_query($adb, "SELECT * FROM allatok WHERE id = $_GET[B]");
$animal = mysqli_fetch_array($query);
$query2 = mysqli_query($adb, "SELECT * FROM users WHERE id = $animal[uploader_id] LIMIT 1");
$uploader = mysqli_fetch_array($query2);

echo("<div class='data-container'>");

echo("<div class='single-image'>");
echo("<img class='big-picture' alt='állat' src='/pictures/$animal[picture].jpg' loading='lazy'>");
echo("</div>");
echo("<div class='data-card'>");
echo("<ul>");
echo("<li>$animal[name]</li>");
echo("<li>Eltűnt: $animal[miss_date]</li>");
echo("<li class='desc'>$animal[description]</li>");
//echo("<li>$animal[city]</li>");
echo("<li>Telefonszám: $uploader[phone]</li>");
echo("</ul>");
echo("</div>");

echo("</div>");

mysqli_close($adb);