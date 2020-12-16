<?php
    include('connect.php');
    $query="SELECT * FROM users";
    $result = mysqli_query($con, $query);

    echo '
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Phone number</th>
            </tr>
        </thead>
        <tbody>';

    while($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>'.$row['username'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['phone'].'</td>';
        echo '</tr>';                
    }
    echo '
        </tbody>
    </table>';

?>