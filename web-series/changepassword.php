<?php      
    include('connect.php');  
    $username = $_POST['username'];  
    $cpassword = md5($_POST['cpassword']);  // Current password
    $npassword = md5($_POST['npassword']);  // New password

        $sql = "select * from users where username = '$username' and password = '$cpassword'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
     
	 $count = mysqli_num_rows($result);  
          
        if($count == 1){ 
            $sql= "update users set password='$npassword' where password='$cpassword'";
            if(mysqli_query($con, $sql)){
                echo "<h1>Password changed successfully</h1>";
            }else{
                $php_errormsg=mysqli_error($con);
                echo "<script>alert(\" Error: $sql $php_errormsg \")</script>";            
                echo "<script>window.location.replace('changepassword.html')</script>";
            }          		  
		}  
        else{  
            echo "<script>alert(\" Invalid username or current password. \")</script>";            
            echo "<script>window.location.replace('changepassword.html')</script>";
        }     
?>  