<?php 
include 'header.php';
include 'process.php';
?>
  
  
<div class="from-group center">
    <h2>Register</h2>
  
    <div class="container">
  
        <br>
		<form name="register" action="process.php" method="post">
		<input type="hidden" name="check_submit" value="1" />
        <label>Username</label>
        <input type="text" name="userName" required>
  
        <br><br>
        <label>Password</label>
        <input type="password" name="passWord" required>
  
        <br><br>
        <label>Verify Password</label>
        <input type="password" name="passWordVerify" required>
  
        <br><br>
        <label>School</label>
        <input type="text" name="school" required>
  
        <br><br>
        <label>Email Address</label>
        <input type="text" name="email" required>
  
  
  
        <br><br>
        <label>&nbsp;</label>
        <button type="submit">Register</button>
  
        <br/><br/>
    </div>
  
</div>
</body>
</html>