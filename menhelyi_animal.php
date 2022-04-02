<?php

include "connect_db.php";

$query = mysqli_query($adb, "SELECT * FROM menhely_allatok WHERE id = '$_GET[B]'");
$animal = mysqli_fetch_array($query);
$query2 = mysqli_query($adb, "SELECT * FROM menhely WHERE id = '$animal[menhely_id]' LIMIT 1");
$uploader = mysqli_fetch_array($query2);

echo("<div class='data-container'>");

echo("<div class='single-image'>");
echo("<img class='big-picture' alt='állat' src='/pictures/$animal[picture].jpg' loading='lazy'>");
echo("</div>");
echo("<div class='data-card'>");
echo("<ul>");
echo("<li>$animal[name]</li>");
echo("<li class='desc'>$animal[description]</li>");
echo("<li>Menhely:&nbsp;<a class='link' href='/menhely/$animal[menhely_id]'>$uploader[nev]</a></li>");
echo("<li>Város: $uploader[city]</li>");
echo("<li>Telefonszám: $uploader[phone]</li>");
echo("</ul>");
echo("</div>");

echo("</div>");

mysqli_close($adb);