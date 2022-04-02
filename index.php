<?php
	session_start();
	include "navbar.php";

	switch ($_GET['A']) {
		case "upload":
			include "upload_missing.php";
			break;

		case "login":
			include "login.php";
			break;

		case "register":
			include "register.php";
			break;

		case "elveszettallatadat":
			include "elveszett_allat.php";
			break;

		case "processing":
			include "processing.php";
			break;

		case "menhelyreg":
			include "menhely_reg.php";
			break;

		case "menhelyek":
			include "menhelyek.php";
			break;

		case "menhelyuser":
			include "user_menhely.php";
			break;

		case "menhelyiallatok":
			include "menhelyi_animal_list.php";
			break;

		case "menhelyiallat":
			include "menhelyi_animal.php";
			break;

		case "user":
			include "user.php";
			break;

		case "menhely":
			include "menhely.php";
			break;

		case "uploadmenhely":
			include "upload_menhely.php";
			break;

		default:
			include "miss_list.php";
			break;
	}
