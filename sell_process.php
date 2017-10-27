<?php

if (array_key_exists('check_sell', $_POST)) {

    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //Variables storing information from sell.php
    $book_title = trim($post['book_title']);
    $isbn = trim($post['isbn']);
    $price = trim($post['price']);
    $quality = trim($post['quality']);
    $username = $_SESSION['user_data']['username'];
    $location = $_SESSION['user_data']['location'];
    $isbn_length = strlen($isbn);
    $is_10_valid = is10($isbn);
    $is_13_valid = is13($isbn);

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
    } elseif (!(floatval($price) > 0)) {
        echo 'Must enter a positive amount for price.';
        header("refresh:5; url=sell.php");
    } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $book_title)) {
        echo 'Invalid book name.';
        header("refrush:5; uri=sell.php");
    } elseif (!($is_10_valid || $is_13_valid)) {
        echo 'Invlaid ISBN';
        header("refresh:5/; url=sell.php");
    } 
//    elseif (!is_numeric($isbn) || $isbn === NULL) {
//        
//        echo 'Invlaid ISBN';
//        echo 'Failing strlen() 10' . '\nstrlen = ' . strlen($isbn); 
//        header("refresh:5; url=sell.php");
//    } 
    else {

        $bookInsert = $connect->prepare("INSERT INTO PRODUCT ("
                . "username, seller_location, isbn, title, "
                . "price, quality) "
                . "VALUES ('$username', '$location', '$isbn', '$book_title', '$price', '$quality')");
        $bookInsert->execute();
        header("Location: index.php");
    }
}

function is10($isbn) {
    return (strlen($isbn) === 10);
}

function is13($isbn) {
    return (strlen($isbn) === 13);
}

?>

