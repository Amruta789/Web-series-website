<?php 
    // Called on submit of login.html     
    include('connect.php');  
    $username = $_POST['username'];  
    $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
     
	 $count = mysqli_num_rows($result);  
          
        if($count == 1){ 
            // If remember me checkbox is checked, creates two cookies to username and role
            if(isset($_POST['rememberme'])){
                $cookie_name = "username";
                $cookie_value = $username;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            } 
            // Based on role in database for the given username, it redirects to the corresponding home page.  
            if($row['username'] == "Admin"){
                echo "<script>window.location.replace('admindashboard.php')</script>";
                
            }else{
                echo "<script>window.location.replace('home.php')</script>";
            }
                     	  
		}  
        else{  // Else enter credentials again 
            echo "<script>alert(\" Login failed. Invalid username or password. \")</script>";            
            echo "<script>window.location.replace('login.html')</script>";
        }     
?>  