<?php 
	session_start();
	include 'header.php';
	
	//Variable for book product code.
	$product_code = $_GET["product_code"];
	
	//Database connection information.
	$dbusername = 'frank73_f17book';
    $dbpassword = 'Book.f17';
	$host = 'www.franklinpracticum.com';
	$db = 'frank73_f17book';
	$connect = new PDO("mysql:host=$host;dbname=$db;", $dbusername, $dbpassword);
	$connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//Variable for storing book information in an array.
	$bookQuery = $connect -> prepare("SELECT * FROM PRODUCT WHERE product_code = :product_code");
	$bookQuery -> bindParam(":product_code", $product_code);
	$bookQuery -> execute();	
	
	if ($bookQuery -> rowCount() > 0)
	{
		$result = $bookQuery -> fetchAll();
		$r = $result[0];	
		
		//Variables holding values from the book information array
		$username = $r[1];
		$seller_location = $r[2];
		$isbn = $r[3];
		$title = $r[4];
		$price = $r[5];
		$quality = $r[6];
?>

	<div class="center">
            <center><h2><?php echo strtoupper($title) ?></h2></center>	

		<!--TODO: User image to the left?, center the container and surround with border and add styles-->

		<div class="center">
			<p>ISBN : <span><?php echo $isbn ?></span></p>
            <p>Price : <span><?php echo $price ?></span></p>            
            <p>Quality : <span><?php echo $quality ?></span></p>
            <?php echo "<p>Seller : <span>"."<a href='profile.php?username=$username'>$username</a></span></p>";?>
			<?php echo "<p>School : <span>"."<a href='https://maps.google.com/?q=$seller_location'>$seller_location</a></span></p>";?>			
		</div>		
		<br>
	</body>
</html>

<?php 
	}
	else 
	{
		header("refresh:0;url = error404.php");
	}
 ?>

        