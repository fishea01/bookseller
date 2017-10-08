<?php
if (array_key_exists('check_submit', $_POST)) {
    
    //Variables storing information from register.php.	
	$school = $_POST['school'];
	$email = $_POST['email'];
	$password = $_POST['passWord'];
	$username = $_POST['userName'];	
	
	//Database connection information.
	$dbusername = 'frank73_f17book';
    $dbpassword = 'Book.f17';
	$host = 'www.franklinpracticum.com';
	$db = 'frank73_f17book';
	$connect = new PDO("mysql:host=$host;dbname=$db;", $dbusername, $dbpassword);
	$connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//Variable used to check if a username exists in the database.
	$usernameQuery = $connect->prepare("SELECT username FROM USERS WHERE username = :username");
	$usernameQuery -> bindParam(":username", $username);
	$usernameQuery -> execute();
	
	//Variable used to check if an email exists in the database.
	$emailQuery = $connect->prepare("SELECT email_address FROM USERS WHERE email_address = :email");
	$emailQuery -> bindParam(":email", $email);
	$emailQuery -> execute();
	
	//Variable holding the String to insert values into the database.
	$insert = "INSERT INTO USERS (username, password, first_name, middle_initial, last_name, location, email_address, area_code, phone_number)
		VALUES ('$username', '$password', null, null, null, '$school', '$email', null, null)";
	
	//Checks if passwords do not match.
	if ($password != $_POST['passWordVerify'])
	{
		echo("Password did not match. Returning to registration page.");
		header("refresh:5;url = register.php");
	}
	//Checks if password is >= 7 characters.
	else if (strlen($password) < 7) 
	{
		echo("Password must be longer than 7 characters.");
		header("refresh:5;url = register.php");
	}
	//Checks if username exists in the database.
	else if ($usernameQuery -> rowCount() > 0)
	{
		echo("Username already taken. Returning to registration page.");
		header("refresh:5;url = register.php");
	}
	//Checks if email exists in the database.
	else if ($emailQuery -> rowCount() > 0)
	{
		echo("Email already exists. Returning to registration page.");
		header("refresh:5;url = register.php");
	}
	//Checks if email is formatted correctly.
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		echo("Please enter a valid email address.");
		header("refresh:5;url = register.php");
	}		
	//If all is successful, adds the user account to the database.
	else
	{
		$connect->exec($insert);
		echo "User successfully registered!";
		header("refresh:5;url=register.php"); //register.php needs changed to the appropriate page after successful registration.
	}
}
?>