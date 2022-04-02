<?php

include "connect_db.php";

switch ($_POST["proc"]) {
		//user registration
	case 1:
		$query = "SELECT * FROM users WHERE email='$_POST[email]'";		//query to check if there's already a user with this email
		$users = mysqli_query($adb, $query);
		if (mysqli_num_rows($users) == 0) {        //if there isn't a user registered with the email then create a new user in the database
			$enc_pass = hash("sha256", $_POST["pass"]);
			$query = "INSERT INTO users (id, username, email, password, phone) VALUES(null, '$_POST[username]', '$_POST[email]', '$enc_pass', '$_POST[phone]')";
			mysqli_query($adb, $query);
		} else {
			mysqli_close($adb);
			sendError("register", "Ezzel az email-el már regisztráltak!");
		}
		mysqli_close($adb);
		header("location: /login");
		break;

		//user login
	case 2:
		$enc_pass = hash("sha256", $_POST["pass"]);	//password encryption
		$query = "SELECT * FROM users WHERE email='$_POST[email]' AND password='$enc_pass'";	//query for checking the user for login
		$users = mysqli_query($adb, $query);
		$query2 = "SELECT * FROM menhely WHERE email='$_POST[email]' AND password='$enc_pass'";		//query for checking menhely for login
		$menhelyek = mysqli_query($adb, $query2);
		if (mysqli_num_rows($users) > 0) {	//if the user exists with the password and email combo then put their id into the session variable
			$user = mysqli_fetch_array($users);
			$_SESSION['uid'] = $user['id'];
			mysqli_close($adb);
			header("location: /");
		} elseif (mysqli_num_rows($menhelyek) > 0) {    //if the menhely exists with the password and email combo then put their id into the session variable
			$user = mysqli_fetch_array($menhelyek);
			$_SESSION['mid'] = $user['id'];
			mysqli_close($adb);
			header("location: /");
		} else {
			mysqli_close($adb);
			sendError("login", "Hibás email vagy jelszó!");
		}
		break;

		//menhely registration
	case 3:
		$query = "SELECT * FROM menhely WHERE email='$_POST[email]'";    //query to check if there's already a menhely with this email
		$menhelyek = mysqli_query($adb, $query);
		$picture_name = hash_file("sha256", $_FILES['pic']['tmp_name']);
		if (mysqli_num_rows($menhelyek) == 0) {		//if there isn't a menhely registered with the email then create a new menhely in the database
			$enc_pass = hash("sha256", $_POST["pass"]);
			$query = "INSERT INTO menhely (id, nev, leiras, cim, city, phone, email, website, picture, password)
									VALUES(null, '$_POST[menhelyname]', '$_POST[desc]', '$_POST[cim]', '$_POST[city]', '$_POST[phone]', '$_POST[email]', '$_POST[website]', '$picture_name', '$enc_pass')";
			mysqli_query($adb, $query);
			placePicture($picture_name);
		} else {
			mysqli_close($adb);
			sendError("register", "Ezzel az email-el már regisztráltak!");
		}
		mysqli_close($adb);
		header("location: /login");
		break;

		//missing animal upload
	case 4:
		$city = strtolower($_POST['city']);
		$input_date = $_POST['miss_date'];
		$date = date("Y-m-d H:i:s", strtotime($input_date));    //converts the html form time into a format that the database accepts
		$picture_name = hash_file("sha256", $_FILES["pic"]['tmp_name']);	//hashing the file contents to generate a new filename
		placePicture($picture_name); 	//function to upload the picture to the server
		$query = "INSERT INTO allatok (id, uploader_id, name, description, picture, city, miss_date, type)
									VALUES(null, '$_SESSION[uid]', '$_POST[name]', '$_POST[desc]', '$picture_name', '$city', '$date', '$_POST[type]')";
		mysqli_query($adb, $query);
		mysqli_close($adb);
		header("location: /");
		break;

		//upload menhely animal
	case 5:
		$picture_name = hash_file("sha256", $_FILES["pic"]['tmp_name']);    //hashing the file contents to generate a new filename
		placePicture($picture_name);    //function to upload the picture to the server
		$query = "INSERT INTO menhely_allatok (id, menhely_id, name, picture, description)
									VALUES(null, '$_SESSION[mid]', '$_POST[name]', '$picture_name', '$_POST[desc]')";
		mysqli_query($adb, $query);
		mysqli_close($adb);
		header("location: /");
		break;

		//upload befogadhato animal UNUSED FUNCTION
//	case 6:
//		$city = strtolower($_POST['city']);
//		$picture_name = hash_file("sha256", $_FILES["pic"]['tmp_name']);    //hashing the file contents to generate a new filename
//		placePicture($picture_name);    //function to upload the picture to the server
//		$query = "INSERT INTO orokbeadando_allatok (id, uploader_id, picture, city, description, type)
//									VALUES(null, '$_SESSION[uid]', '$picture_name', '$city', '$_POST[desc]', '$_POST[type]')";
//		mysqli_query($adb, $query);
//		mysqli_close($adb);
//		header("location: /");
//		break;

		//user animal deletion
	case 7:
		$query = "DELETE FROM allatok WHERE id = $_POST[delete_id]";
		$query2 = mysqli_query($adb, "SELECT * FROM allatok WHERE uploader_id = $_SESSION[uid] AND id = $_POST[delete_id]");		//query to check which animal the user wants to delete, with user validation
		$picture = mysqli_fetch_array($query2);
		$filename = "$picture[picture].jpg";
		if(mysqli_num_rows($query2) == 1) {		//deletes the pictures of the animal from the server, and the data from the database
			unlink("/pictures/$filename");
			unlink("/small_pictures/$filename");
			mysqli_query($adb, $query);
		}
		mysqli_close($adb);
		header("location: /user");
		break;

		//menhely animal deletion
	case 8:
		$query = "DELETE FROM menhely_allatok WHERE id = $_POST[delete_id]";
		$query2 = mysqli_query($adb, "SELECT * FROM menhely_allatok WHERE menhely_id = $_SESSION[mid] AND id = $_POST[delete_id]");    //query to check which animal the user wants to delete, with user validation
		$picture = mysqli_fetch_array($query2);
		$filename = "$picture[picture].jpg";
		if (mysqli_num_rows($query2) == 1) {    //deletes the pictures of the animal from the server, and the data from the database
			unlink("/pictures/$filename");
			unlink("/small_pictures/$filename");
			mysqli_query($adb, $query);
		}
		mysqli_close($adb);
		header("location: /menhelyuser");
		break;

		//logout
	case 9:
		session_destroy();
		mysqli_close($adb);
		header("location: /");
		break;
}

//function to upload pictures to the server, it needs and input that defines the filename after the upload, uploads the original copy to the /pictures folder and makes a smaller copy to the /small_pictures folder
function placePicture($picture_name) {
	move_uploaded_file($_FILES["pic"]['tmp_name'], "/pictures/" . $picture_name . ".jpg");
	$big_picture = imagecreatefromjpeg("/pictures/" . $picture_name . ".jpg");

	$bigX = imagesx($big_picture);
	$bigY = imagesy($big_picture);

	if ($bigX > $bigY) {
		$smallX = 200;
		$smallY = $smallX / $bigX * $bigY;
	} else {
		$smallY = 200;
		$smallX = $smallY / $bigY * $bigX;
	}

	$small_picture = imagecreatetruecolor($smallX, $smallY);

	imagecopyresampled(
		$small_picture,
		$big_picture,
		0, 0, 0, 0,
		$smallX,
		$smallY,
		$bigX,
		$bigY
	);

	imagejpeg($small_picture, "/small_pictures/" . $picture_name . ".jpg");

	imagedestroy($small_picture);
	imagedestroy($big_picture);
}

//function for the error messages, the 2 inputs are the page destination and the message that it will display, the popup_error.php file has to be included on the destination page for it to work
function sendError($redirect, $message) {
	$_SESSION["error_message"] = $message;
	$_SESSION["error"] = 1;
	header("location: /$redirect");
}

mysqli_close($adb);