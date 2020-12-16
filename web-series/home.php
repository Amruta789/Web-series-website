<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="cookies.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body onload="checkCookie()">
        <div class="container">
        <h1>WELCOME!!! </h1>
        <div style="float: right;">
            <button class="btn btn-outline-primary" onclick="window.location.assign('changepassword.html')">Change password</button>
            <button class="btn btn-outline-primary" onclick="deleteCookie()">Log out</button>
        </div>       
        <?php
            include('connect.php');
            $query="SELECT * FROM webseries";
            $result = mysqli_query($con, $query);

            while($row = mysqli_fetch_array($result)) {
                echo '<div>';
                echo '<h1>'.$row['WebSeriesName'].'</h1>';
                echo '<div class="center"><video class="videos" controls><source src="'.$row['VideoPath'].'" ></video></div>';
                echo '<div class="grid-container">';
                echo '<div class="grid-item"><img  class="images" src="'.$row['ImagePath'].'" alt="Web series"></div>';
                echo '<div class="grid-item"><ul>';                                
                echo '<li> Genre: '.$row['Genre'].'</li>';
                echo '<li> Number of seasons: '.$row['SeasonsNumber'].'</li>';
                echo '<li> Number of episodes per season: '.$row['EpisodesNumber'].'</li>';
                echo '<li> Approximate Duration of each episode in minutes: '.$row['Duration'].'</li>';
                echo '<li> IMDb Rating (between 0 to 10): '.$row['Rating'].'</li>';
                echo '<li> Date of Upload: '.$row['UploadDate'].'</li>';
                echo '</ul></div>';
                echo '</div>';
                echo '<hr></div>';
            }
        ?>
        </div>    
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>        
    </body>
</html>