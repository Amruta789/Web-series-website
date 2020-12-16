<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <style>
        table, th, td {
                border: 1px solid black;
        }
    </style>
</head>
<body>
<?php
    include('connect.php');
    $username = $_POST['username'];
    $query="SELECT * FROM users WHERE username='$username'";
    try{
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        echo '
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone number</th>
                </tr>
            </thead>
            <tbody>
                <tr>';
        
                    echo '<td>'.$row['username'].'</td>';
                    echo '<td>'.$row['email'].'</td>';
                    echo '<td>'.$row['phone'].'</td>';               
            echo '
                </tr>
            </tbody>
        </table>';
    }catch(Exception $ex){
        $code = $ex->getCode();
        $message = $ex->getMessage();
        $file = $ex->getFile();
        $line = $ex->getLine();
        echo "Exception thrown in $file on line $line: [Code $code]
        $message";
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>