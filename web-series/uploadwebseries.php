<?php 
    include('connect.php');
    $webseriesname = $_POST['name'];  
    $genre = $_POST['genre'];
    $seasons=$_POST['seasons'];
    $episodes=$_POST['episodes']; 
    $duration = $_POST['duration'];
    $ratings = $_POST['ratings']; 
    include('uploadfiles.php');
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_imagefile) && move_uploaded_file($_FILES["video"]["tmp_name"], $target_videofile)) {
            echo "The files ". htmlspecialchars( basename( $_FILES["image"]["name"]))." and ". htmlspecialchars( basename( $_FILES["video"]["name"])). " has been uploaded.";
            $sql = "insert into webseries(WebSeriesName, Genre, SeasonsNumber, EpisodesNumber, Duration, Rating, ImagePath, VideoPath) 
            values('$webseriesname','$genre','$seasons','$episodes','$duration','$ratings', '$target_imagefile', '$target_videofile') ";     
            if (mysqli_query($con, $sql)) {
                echo "<script>alert(\"The web series: $webseriesname is registered\")</script>";
            } else {
                $php_errormsg=mysqli_error($con);
                echo "<script>alert(\"Error: $sql $php_errormsg\")</script>";
            }
            echo "<script>window.location.replace('webseriesform.html')</script>";
    
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } 
    
      
        
?>  