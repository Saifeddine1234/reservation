<?php 
    session_start();
    if(isset($_GET['revenir']))
    {
         session_destroy();
        header("location:success.php");
    }
 
?>