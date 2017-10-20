<?php 
	session_start();
	include 'header.php'; //header is not working currently, reinclude when fixed.
	
	//Variable for username.
	$username = $_GET["username"];
		
	//Database connection information.
	$dbusername = 'frank73_f17book';
    $dbpassword = 'Book.f17';
	$host = 'www.franklinpracticum.com';
	$db = 'frank73_f17book';
	$connect = new PDO("mysql:host=$host;dbname=$db;", $dbusername, $dbpassword);
	$connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//Retrieval of user information for display on profile.
	$userQuery = $connect -> prepare("SELECT username, first_name, last_name, location, email_address, phone_number FROM USERS WHERE username = :username");
	$userQuery -> bindParam(":username", $username);
	$userQuery -> execute();
	if ($userQuery -> rowCount() > 0)
	{	
		$userQueryResult = $userQuery -> fetchAll();
		$r = $userQueryResult[0];
	
		//Variables pulled from array	
		$usernameProfile = $r[0];
		$first_name = $r[1];
		$last_name = $r[2];
		$location = $r[3];
		$email_address = $r[4];
		$phone_number = $r[5];
	
		//Retrieval of ratings statistics.
		$ratingQuery = $connect -> prepare("SELECT seller_rating FROM SALES WHERE username = :username");
		$ratingQuery -> bindParam(":username", $username);
		$ratingQuery -> execute();
		$ratingQueryResult = $ratingQuery -> fetchAll(PDO::FETCH_COLUMN, 0);
		
		//Trim null values from Array.
		$ratingQueryResult = array_filter($ratingQueryResult, function($var){return !is_null($var);});
			
		//Variable holding seller rating and total number of ratings.
		$seller_rating = 0;
		
		if ($ratingQuery -> rowCount() > 0)
		{
			//Add all ratings
			foreach ($ratingQueryResult as $value)
			{
				$seller_rating += $value;
			}	
	
			//Average the total ratings
			$seller_rating /= count($ratingQueryResult);
	
			//Rounding rating to next highest whole number if the rating average is not a whole number
			$seller_rating = round($seller_rating, 0, PHP_ROUND_HALF_UP); //Currently rounding to next highest whole number
		}
?>
        <!--TODO: User image to the left?, center the container and surround with border and add styles-->
        
        <div class="center">
			<div class="container">
				<h2>Overview for <?php echo ucwords($usernameProfile) ?></h2>
				<?php
					if ($ratingQuery -> rowCount() > 0)
					{ ?>
						<p>Rated <?php echo $seller_rating ?> stars out of 5!<p>
					<?php 
					} 					
					else
					{ ?>
						<p><?php echo $usernameProfile ?> has no ratings!</p>
					<?php
					} ?>
				<br>
				<p>Name : <span><?php echo ucwords($first_name) . ' ' . ucwords($last_name) ?></span></p>                       
				<p>Location : <span><?php echo $location ?></span></p>
				<p>Email : <span><?php echo $email_address ?></span></p>
				<p>Phone Number : <span><?php echo $phone_number ?></span></p>
			</div>
        </div>
    </body>
</html>
<?php
	}
	else
	{
		header("refresh:0;url = error404.php");
	}