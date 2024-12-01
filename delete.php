<?php
if (isset($_GET["staffID"]) ) {
    $staffid = $_GET["staffID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fastfood";

    //Create Connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM staff WHERE staffID = $staffid";
    $connection -> query($sql);
}

header("location: /fastfood/index.php");
exit;
?>