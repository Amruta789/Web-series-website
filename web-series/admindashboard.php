<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="cookies.js"></script>
        <script>
            function toggleAppearance(x){
                var dataDiv = document.getElementById(x);
                if(dataDiv.style.display === "none"){
                    dataDiv.style.display = "block";
                }else{
                    dataDiv.style.display = "none";
                }
            }
        </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <style>
            table, th, td {
                border: 1px solid black;
                padding: 15px;
                text-align: center;
            }
        </style>
    </head>
    <body onload="checkCookie()">
        <h1>Welcome, Admin!!!</h1>
        <h1>Admin Dashboard</h1>
        <div class="container">
            <button class="btn btn-primary" onclick="window.location.assign('register.html')">Insert</button>
            <button class="btn btn-primary" onclick="toggleAppearance('updaterecord')">Update</button>
            <button class="btn btn-primary" onclick="toggleAppearance('deleterecord')">Delete</button>
            <button class="btn btn-primary" onclick="toggleAppearance('onerecordinput')">View single record</button>
            <button class="btn btn-primary" onclick="toggleAppearance('allrecords')">View All Details</button>
            <button class="btn btn-primary" onclick="window.location.assign('changepassword.html')">Change Your Password</button>
            <button class="btn btn-primary" onclick="window.location.assign('webseriesform.html')">Upload Web series</button>
            <button class="btn btn-primary" onclick="window.location.assign('home.php')">Display Web series</button>
            <button class="btn btn-primary" onclick="deleteCookie()">Log out</button><br><br>
            
            <div id="allrecords" style="display:none">
                <?php
                    include 'admintabledata.php';
                ?>
            </div>
            <div id="onerecordinput" class="container" style="display:none">
                <form action="adminsinglerecord.php" method="POST" onsubmit="toggleAppearance('onerecord')">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username"  id="username" class="form-control">
                    </div>
                    <input class="btn btn-primary" type="submit" value="View Details">
                </form>
            </div>
            <div id="updaterecord" class="container" style="display:none">
                <form action="adminupdate.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="column" class="form-label">Select column name:</label>
                        <select name="column" id="column" class="form-select">
                            <option value="username">Username</option>
                            <option value="email">Email address</option>
                            <option value="phone">Phone number</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="newvalue" class="form-label">Enter new value:</label>
                        <input type="text" name="newvalue" id="newvalue" class="form-control">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </form>
            </div>
            <div id="deleterecord" class="container" style="display:none">
                <form action="admindelete.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Delete">
                </form>
            </div>
            <div id="onerecord" style="display:none">
                <?php
                    include 'adminsinglerecord.php';
                ?>
            </div>
        </div> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>