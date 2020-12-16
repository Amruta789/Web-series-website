<?php
    // Checks for cookie, and role of username in cookie, then redirects to corresponding home page.
    if(isset($_COOKIE["username"])){
        if($_COOKIE['username']=='Admin'){
            header("location: admindashboard.php" );        
        }else{
            header('location: home.php');
        }
    }else{ //Else redirects to login
        header('location:login.html');        
    }
?>
