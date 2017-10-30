<?php
	//Database connection information.
	$dbusername = 'frank73_f17book';
    $dbpassword = 'Book.f17';
	$host = 'www.franklinpracticum.com';
	$db = 'frank73_f17book';
	$connect = new PDO("mysql:host=$host;dbname=$db;", $dbusername, $dbpassword);
	$connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$product = $_POST['bookVal'];
	
	$removeQuery = $connect -> prepare("DELETE FROM PRODUCT WHERE product_code = :product");
	$removeQuery -> bindParam(":product", $product);
	$removeQuery -> execute();
	
	echo "Book successfully removed!";
	header("refresh:5;url = index.php");
?>