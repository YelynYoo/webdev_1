<?php
if (isset($_GET["staffid"]) ) {
    $staffid = $_GET["staffid"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fastfood";

    //Create Connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM staff WHERE staffid = $staffid";
    $connection -> query($sql);
}

header("location: /fastfood/index.php");
exit;
?>