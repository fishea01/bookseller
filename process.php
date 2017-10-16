<?php
if (array_key_exists('check_submit', $_POST)) {
    
    //Variables storing information from register.php.	
	$school = trim($_POST['school']);
	$email = trim($_POST['email']);
	$password = trim($_POST['passWord']);
	$username = trim($_POST['userName']);
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $phoneNumber = trim($_POST['phoneNumber']);
	
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
	$insert = "INSERT INTO USERS (username, password, first_name, last_name, phone_number, location, email_address)
		VALUES ('$username', '$password', '$firstName', '$lastName', '$phoneNumber', '$school', '$email')";
	
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
        else if (strlen($school) <= 0)
        {
            echo("Please enter a valid school.");
            header("refresh:5;url = register.php");
        }
        else if (strlen($firstName) <= 0)
        {
            echo("Please enter a valid first name.");
            header("refresh:5;url = register.php");
        }
        else if (strlen($lastName) <= 0)
        {
            echo("Please enter a valid last name.");
            header("refresh:5;url = register.php");
        }
        else if (!ctype_digit($phoneNumber))
	{
		echo("Please enter a valid phone number.");
		header("refresh:5;url = edit_profile.php");
	}
	//If all is successful, adds the user account to the database.
	else
	{
		$connect->exec($insert);
		header("Location: login.php"); //register.php needs changed to the appropriate page after successful registration.
	}
}
?>