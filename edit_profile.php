<?php 
	session_start();
	include "header.php";
				
	$username = $_SESSION['user_data']['username'];			
	
	$dbusername = 'frank73_f17book';
	$dbpassword = 'Book.f17';
	$host = 'www.franklinpracticum.com';
	$db = 'frank73_f17book';
	$connect = new PDO("mysql:host=$host;dbname=$db;", $dbusername, $dbpassword);
	$connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$profile_query = $connect -> prepare("SELECT first_name, last_name, location, email_address, phone_number FROM USERS WHERE username = :username");
	$profile_query -> bindParam(":username", $username);
	$profile_query -> execute();
	$result = $profile_query -> fetch(PDO::FETCH_ASSOC);
?>
        <!--TODO: User image to the left?, center these container and surround with border and add styles-->
<html>         
    <body>    
		<div class="form-group center">
            <div class="container">
            <h2>Edit Profile</h2>
			<form name="update_profile" action="edit_profile_process.php" method="post">
			<input type="hidden" name="check_submit" value="1"/>			
				<br>
				<label class="form-label">First Name: </label>
			<?php
				if ($result['first_name'] != NULL)
				{ ?>			
					<input type="text" name="first_name" value="<?= $result['first_name']?>" required>				
			<?php 
				}
				else
				{ ?>
					<input type="text" name="first_name" required>
			<?php
				} ?>
				<br>
				<br>
				
				<label class="form-label">Last Name: </label>				
			<?php
				if ($result['last_name'] != NULL)
				{ ?>				
					<input type="text" name="last_name" value="<?= $result['last_name']?>" required>				
			<?php 
				}
				else
				{ ?>
					<input type="text" name="last_name" required>	
			<?php
				} ?>				
				<br>
				<br>
                                
                                <label class="form-label">Phone Number: </label>				
			<?php
				if ($result['phone_number'] != NULL)
				{ ?>				
					<input type="text" name="phone_number" value="<?= $result['phone_number']?>" required>				
			<?php 
				}
				else
				{ ?>
					<input type="text" name="phone_number" required>	
			<?php
				} ?>				
				<br>
				<br>
				
				<label class="form-label">School: </label>
			<?php
				if ($result['location'] != NULL)
				{ ?>	
					<input type="text" name="location" value="<?= $result['location']?>" required>				
			<?php 
				}
				else
				{ ?>	
					<input type="text" name="location" required>				
			<?php
				} ?>
				<br>
				<br>
				
				<label class="form-label">Email: </label>
			<?php
				if ($result['email_address'] != NULL)
				{ ?>				
					<input type="text" name="email" value="<?= $result['email_address']?>" required>
			<?php 
				}
				else
				{ ?>	
					<input type="text" name="email" required>				
			<?php
				} ?>
				<br>
				<br>
			
             
			<label>&nbsp;</label>
			<button type="submit">Update Profile</button>
			<a href = index.php>
				<button type="submit">Cancel</button>
            </a>
			</form>
            <br>
			<br>
            </div>
        </div>
    </body>
</html>