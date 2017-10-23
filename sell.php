<?php
include "header.php";

if (!isset($_SESSION['is_logged_in'])) {
    header("Location: login.php");
}
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$username = $_SESSION['user_data']['username'];

$dbusername = 'frank73_f17book';
$dbpassword = 'Book.f17';
$host = 'www.franklinpracticum.com';
$db = 'frank73_f17book';
$connect = new PDO("mysql:host=$host;dbname=$db;", $dbusername, $dbpassword);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$profile_query = $connect->prepare("SELECT first_name, last_name, location, email_address, phone_number FROM USERS WHERE username = :username");
$profile_query->bindParam(":username", $username);
$profile_query->execute();
$result = $profile_query->fetch(PDO::FETCH_ASSOC);
?>

<div class="from-group center">


    <div class="container">

        <h2>Sell Book</h2>

        <form name="sell_book" action="sell_process.php" method="post">
            <input type="hidden" name="check_sell" value="1"/>
            <br>

            <label class="form-label">Title</label>
            <input type="text" placeholder="Book Title" name="book_title" required>

            <br><br>
            <label class="form-label">ISBN</label>
            <input type="text" placeholder="Enter ISBN" name="isbn" required>

            <br><br>
            <label class="form-label">Enter Price</label>
            <input type="text" placeholder="0.00" name="price" required>

            <br><br>
            <label class="form-label">Quality of Book</label>
            <input type="text" placeholder="Enter Quality" name="quality" required>

            <br><br>
            <label>&nbsp;</label>
            <div>
                <button type="submit">Sell</button>
                <button type="cancel">Cancel</button>
            </div>
        </form>
        <br/><br/>
    </div>

</div>
</body>
</html>