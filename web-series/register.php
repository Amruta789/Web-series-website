<?php 
    include('connect.php'); 
    $username = $_POST['username'];  
    $password = md5($_POST['password']); 
    $phone = $_POST['phone'];
    $email = $_POST['email']; 
      
        $sql = "insert into users(username, password, phone, email) values('$username','$password','$phone','$email') ";     
        if (mysqli_query($con, $sql)) {
            echo "<script>alert(\"Username: $username is registered\")</script>";
            echo "<script>window.location.replace('login.html')</script>";
        } else {
            $php_errormsg=mysqli_error($con);
            echo "<script>alert(\"Error: $sql $php_errormsg\")</script>";
            echo "<script>window.location.replace('register.html')</script>";
        }
?>  