<?php include 'header.php'; ?>

<div class="form-group center">
        <div class="container">
            <h2>Login</h2>
            <br>
            <form name="login" action="loginScript.php" method="post">
                <input type="hidden" name="loginSubmit" value="1"/>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <br><br>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password"  name="password" required>
                </div>
                <br><br>
                <label>&nbsp;</label>
                <button type="submit">Login</button>
            </form>
            <br /><br />
           
        </div>
        </div>
    </body>
</html>
