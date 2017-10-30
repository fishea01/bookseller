<?php
	
	//Database connection information.
	$dbusername = 'frank73_f17book';
    $dbpassword = 'Book.f17';
	$host = 'www.franklinpracticum.com';
	$db = 'frank73_f17book';
	$connect = new PDO("mysql:host=$host;dbname=$db;", $dbusername, $dbpassword);
	$connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$product = $_POST['bookValue'];
	$rating = $_POST['rating'];
	$comment = $_POST['sellerComment'];
	$email_address = $_POST['inputEmail'];
	$emailQuery = $connect -> prepare("SELECT email_address FROM USERS WHERE email_address = :email");
	$emailQuery -> bindParam(":email", $email_address);
	$emailQuery -> execute();
	
	$soldQuery = $connect -> prepare("UPDATE PRODUCT SET sold=1 WHERE product_code = :product");
	$soldQuery -> bindParam(":product", $product);
	
	$productQuery = $connect -> prepare("UPDATE SALES SET cust_rating='$rating', cust_comment='$comment' WHERE product_code = :productOne");
	$productQuery -> bindParam(":productOne", $product);
	
	if ($emailQuery -> rowCount() <= 0)
	{
		echo "Invalid email address.";
		header("refresh:5;url = index.php");
	}
	else if ($rating == -1)
	{
		echo "Please leave a rating";
		header("refresh:5;url = index.php");
	}
	else
	{		
		$soldQuery -> execute();
		$productQuery -> execute();
	}
	
?>