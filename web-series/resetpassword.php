<?php
    include('connect.php');  
    $rand = substr(md5(microtime()),rand(0,26),6); // a random alphanumeric string of six characters
    $username = $_POST['username'];  
    $phone = $_POST['phone'];
    $email=$_POST['email'];
    $newpassword=md5($rand); //md5 hash on password 
      
        $sql = "select * from users where username = '$username' and phone = '$phone' and email = '$email'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
     
	 $count = mysqli_num_rows($result);  
          
        if($count == 1){
            // Changes password to a random string and displays new password as alert  
            $sql= "update users set password='$newpassword' where username='$username'";
            if(mysqli_query($con, $sql)){
                echo "<script>alert(\"Password reset successfully. New password is $rand\")</script>";
                echo "<script>window.location.replace('login.html')</script>";
            }else{
                $php_errormsg=mysqli_error($con);
                echo "<script>alert(\" Error: $sql $php_errormsg \")</script>";            
                echo "<script>window.location.replace('resetpassword.html')</script>";
            }		  
		}  
        else{  
            echo "<script>alert(\" Invalid username or phone number or email. \")</script>";            
            echo "<script>window.location.replace('resetpassword.html')</script>";
        }     

?>