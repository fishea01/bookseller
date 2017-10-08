<?php
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();
        
        echo '<h1>Logged Out</h1>';
        
        header("refresh:2;url=index.php");
   ?>