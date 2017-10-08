<?php
if (array_key_exists('loginSubmit', $_POST)) {
    
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
	//Database connection information.
	$dbusername = 'frank73_f17book';
    $dbpassword = 'Book.f17';
	$host = 'www.franklinpracticum.com';
	$db = 'frank73_sf17book';
                
        try {
            $connect = new PDO("mysql:host=$host;dbname=$db;", $dbusername, $dbpassword);
            $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $userQuery = $connect->prepare("SELECT * FROM USERS WHERE username = :username AND password = :password");
        $userQuery->bindParam(":username", $post['username']);
        $userQuery->bindParam(":password", $post['password']);
        $userQuery->execute();
        $result = $userQuery->fetch(PDO::FETCH_ASSOC);
        
        } catch (Exception $except) {
            echo $except;
            die('Error connecting to database');
        }
        
        
        
        // if there is an item in result a record was found
        if($result) {
            echo '<h1>Logged In</h1>';
            $_SESSION['is_logged_in'] = true;
            
            // Used to store session data, can add anything what was retreived from database
            // will be available thoughout a logged in session
            $_SESSION['user_data'] = array(
              
                "firstName" => $result['first_name'],
                "lastName"  => $result['last_name'],
                "email"     => $result['email_address']
            );
            
            header("refresh:2;url=index.php");
        } else {
            echo 'Incorrect Login';
            header("refresh:2;url=login.php");
        }
        }

?>