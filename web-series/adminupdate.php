<?php
    include('connect.php');
    $username = $_POST['username'];
    $column = $_POST['column'];
    $newvalue = $_POST['newvalue'];
    $query="UPDATE users SET $column ='$newvalue' WHERE username='$username'";
    if(mysqli_query($con, $query)){
        echo "<script>alert(\"Updated succesfully\")</script>";
    }else{
        $php_errormsg=mysqli_error($con);
        echo "<script>alert(\"Error: $sql $php_errormsg\")</script>";
    }
?>