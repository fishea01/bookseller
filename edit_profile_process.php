<?php
session_start();
if (array_key_exists('check_submit', $_POST)) {
	
	//Variables storing information from edit_profile.php
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$phone_number = $_POST['phone_number'];
	$location = $_POST['location'];
	$email = $_POST['email'];
	$username = $_SESSION['user_data']['username'];
	
	//Database connection information.
    $dbusername = 'frank73_f17book';
    $dbpassword = 'Book.f17';
    $host = 'www.franklinpracticum.com';
    $db = 'frank73_f17book';
    $connect = new PDO("mysql:host=$host;dbname=$db;", $dbusername, $dbpassword);
    $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//Variable used to update user information within the database.
	$update_query = $connect -> prepare("UPDATE USERS SET first_name = '$first_name', last_name = '$last_name', phone_number = '$phone_number', location = '$location', email_address = '$email' WHERE username = :username");
	$update_query -> bindParam(":username", $username);
	
	
	//Variable used to check if an email exists in the database.
	$emailQuery = $connect->prepare("SELECT email_address FROM USERS WHERE email_address = :email");
	$emailQuery -> bindParam(":email", $email);
	$emailQuery -> execute();
	
	if ($emailQuery -> rowCount() > 0 || !filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		echo("Invalid Email. Returning to Profile.");
		header("refresh:5;url = edit_profile.php");
	}
	else if (!ctype_digit($phone_number))
	{
		echo("Phone number contains one or more non-numeric values. Returning to Profile.");
		header("refresh:5;url = edit_profile.php");
	}
	else
	{
		$update_query -> execute();
		echo("Profile successfully updated!");
		header("refresh:5;url = index.php");
	}
}
?>