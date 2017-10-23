<?php

if (array_key_exists('check_sell', $_POST)) {

    //Variables storing information from sell.php
    $book_title = trim($_POST['book_title']);
    $isbn = trim($_POST['isbn']);
    $price = trim($_POST['price']);
    $quality = trim($_POST['quality']);
    $username = $_SESSION['user_data']['username'];
    $location = $_SESSION['user_data']['location'];

    
    // TODO: this required product code needs to be changed to something
    // such as an auto increment primary key and removed from the query 
    $product_code = 'code10';

    $displayError = false;
    //Database connection information.
    $dbusername = 'frank73_f17book';
    $dbpassword = 'Book.f17';
    $host = 'www.franklinpracticum.com';
    $db = 'frank73_f17book';
    $connect = new PDO("mysql:host=$host;dbname=$db;", $dbusername, $dbpassword);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if (!is_numeric($price)) {
        echo 'Price is not a valid number';
        header("refresh:5; url=sell.php");
    } elseif (!is_numeric($isbn)) {
        echo 'Invlaid ISBN';
        header("refresh:5; url=sell.php");
    } else {

        $bookInsert = $connect->prepare("INSERT INTO PRODUCT (product_code, "
                . "username, seller_location, isbn, title, "
                . "price, quality) "
                . "VALUES ('$product_code', '$username', '$location', '$isbn', '$book_title', '$price', '$quality')");
        $bookInsert->execute();
        header("Location: index.php");
    }
}
?>

