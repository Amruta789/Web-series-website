<?php
    include('connect.php');
    $username = $_POST['username'];
    $query="DELETE FROM users WHERE username='$username'";
    if(mysqli_query($con, $query)){
        echo "<script>alert(\"Username: $username record is deleted\")</script>";
    }else{
        $php_errormsg=mysqli_error($con);
        echo "<script>alert(\"Error: $sql $php_errormsg\")</script>";
    }
?>