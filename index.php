<?php 
	session_start();
	include 'header.php';
	
	//Database connection information.
	$dbusername = 'frank73_f17book';
    $dbpassword = 'Book.f17';
	$host = 'www.franklinpracticum.com';
	$db = 'frank73_f17book';
	$connect = new PDO("mysql:host=$host;dbname=$db;", $dbusername, $dbpassword);
	$connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (session_status() != PHP_SESSION_NONE)
	{
		$username = $_SESSION["user_data"]["username"];
	}
	$booksForSaleQuery = $connect -> prepare('SELECT title, price, product_code FROM PRODUCT WHERE username = :username AND sold = 0');
	$booksForSaleQuery -> bindParam(":username", $username);
	$booksForSaleQuery -> execute();
	
	$purchaseQuery = $connect -> prepare("SELECT * FROM SALES WHERE username = :username AND seller_rating = null OR seller_comment = null ORDER BY purchase_date DESC LIMIT 0, 3");
	$purchaseQuery -> bindParam(":username", $username);
	$purchaseQuery -> execute();
	
?>

	<div class="container">
    <div class="panel panel-default">
	
        <!--Search in the header-->
        <div class="panel-heading text-center clearfix">
            <div class="pull-left">
                <h3>Your Listings</h3>
            </div>
        </div>
	
<?php	
	if ($booksForSaleQuery -> rowCount() > 0)
	{
		$booksForSaleQueryResult = $booksForSaleQuery -> fetchAll();
		
		foreach($booksForSaleQueryResult as $b)
		{
			$title = $b[0];
			$price = $b[1];
			$product_code = $b[2];
			//define an int and increment, attach to stars
?>	
	<div class="panel-body">
		<div class="container">	
			<div class="row">
                
				<div class="col-md-3"><a href="book.php?product_code=<?php echo $product_code ?>"><?php echo $title?></a></div>
                <div class="col-md-3">$ <?php echo $price?></div>
                    
                <div class="col-md-3">
                        <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#<?php echo $product_code?>">Mark as Sold</button>
                </div>
					<div class="col-md-3">
					<form action="index_remove.php" method="post">
						<input type="hidden" name="bookVal" value="<?php echo $product_code ?>"></input>
						<button type="submit" class="btn btn-default">Remove</button>
					</form>
					</div>
            </div>
			
			<!--The collapsible div under the book-->
                <div id="<?php echo $product_code?>" class="collapse">
                    <form name="formOne" method="post" action="index_process.php">
						<input type="hidden" name="bookValue" value="<?php echo $product_code ?>"></input>
                        <div class="row">
                            <div class="col-md-offset-1 col-md-9"><hr></div>
                        </div>
						
                        <!--Top row of the collapsible-->
						<div class="row clearfix">
							<div class="col-md-offset-1 col-md-4">
								<div class="form-inline">
                                    <label for="buyerEmail">Buyers Email:</label>
                                    <input type="email" class="email" name="inputEmail" required></input>
                                </div>
                            </div>
							<!--Rating Script-->
							<script type="text/javascript">
							$('.rating-container .glyphicon-star-empty').click(function() {
							$('.rating-container .glyphicon-star-empty').removeClass('selected');
							$(this).prevAll('.glyphicon-star-empty').addBack().addClass('selected');
							var rating = $(this).data('rating');
							$('#rating').val(rating);
							});
							</script>
                            <div class="col-md-offset-1 col-md-2">
                                <div class="rating-container">
									<input type="hidden" id="rating" name="rating" value="-1"></input>
                                    <div class="glyphicon glyphicon glyphicon-star-empty" data-rating="1"></div>
                                    <div class="glyphicon glyphicon glyphicon-star-empty" data-rating="2"></div>
                                    <div class="glyphicon glyphicon glyphicon-star-empty" data-rating="3"></div>
                                    <div class="glyphicon glyphicon glyphicon-star-empty" data-rating="4"></div>
                                    <div class="glyphicon glyphicon glyphicon-star-empty" data-rating="5"></div>
                                </div>
                            </div>
                            <div clas="col-md-offset-2 col-md-2">
                                <div class="form-group">									
                                    <button type="submit" class="btn btn-default">Submit</button>
									<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#<?php echo $product_code?>">Cancel</button>									
                                </div>
                            </div>
                        </div>

                        <!--Bottom row of the collapsible--> 
                        <div class="row">
                            <div class="col-md-offset-1 col-md-9">
                                <div class="form-group">
                                    <label for="comment">Comment:</label>
                                    <textarea name="sellerComment" class="form-control" rows="4" id="comment" value="<?php echo $comment?>"></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-inline">
                                    <label>&nbsp;</label>

                                </div> 
                            </div>
                        </div>
                    </form>
                </div>
			</div>
        </div>
                
<?php	}
	} ?>
        <div class="panel-footer text-center">
            <p><?php echo $booksForSaleQuery -> rowCount()?> books listed</p>
        </div>
    </div>

    <div class="panel panel-default">

        <!--Search in the header-->
        <div class="panel-heading text-center clearfix">

            <div class="pull-left">
                <h3>Recent Purchases</h3>
            </div>
        </div>
<?php
	if ($purchaseQuery -> rowCount() > 0 )
	{
		$purchaseQueryResult = $purchaseQuery -> fetchAll();
		
		foreach($purchaseQuery as $p)
		{
			$titlePurchase = $p[0];
?>
        <div class="panel-body">
			<div class="container">	
				<div class="row">
                    <div class="col-md-3"><a href="book.php?product_code=<?php echo $product_code ?>"><?php echo $titlePurchase?></a></div>
					<div class="col-md-3">
                        <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#<?php echo $product_code?>">Mark as Sold</button>
                    </div>
				</div>
			</div>
		</div>
<?php
		}
	}
	else 
	{ ?>
		<p>Nothing here currently...go buy some books! :)</p>
<?php
	} ?>

        <!--TODO: Search results maybe?--> 
        <div class="panel-footer text-center">
            <p></p>
        </div>


    </div>
</div>
</body>
</html>

