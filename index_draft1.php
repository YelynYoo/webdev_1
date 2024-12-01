<?php

session_start();

if (isset($_SESSION["staffid"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE staffid = {$_SESSION["staffid"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Staff</h2>
        <a class = "btn btn-primary" href="/fastfood/create.php" role="button">New Staff</a>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Mob</th>
                    <th>Password</th>
                    <th>Role ID</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "fastfood";

                //Create Connection
                $connection = new mysqli($servername, $username, $password, $database);

                //Check Connection
                if ($connection -> connect_error) {
                    die("Connection failed: " . $connection -> connect_error);
                }

                //Read all row from database table
                $sql = "SELECT * FROM staff";
                $result = $connection -> query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection -> error);
                }

                //Read data of each row
                while($row = $result -> fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[staffID]</td>
                        <td>$row[name]</td>
                        <td>$row[address]</td>
                        <td>$row[dateOfBirth]</td>
                        <td>$row[email]</td>
                        <td>$row[mob]</td>
                        <td>$row[passwordHash]</td>
                        <td>$row[roleID]</td>

                        <td>
                            <a class='btn btn-primary btn-sm' href='/fastfood/edit.php?staffid=$row[staffID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/fastfood/delete.php?staffid=$row[staffID]'>Delete</a>
                            <a class='btn btn-primary btn-sm' href='/fastfood/logout.php?staffid=$row[staffID]'>Log out</a>
                            </td>
                    </tr>

                    ";
                }
                ?>

                
            </tbody>
        </table>
    </div>
    
</body>
</html>