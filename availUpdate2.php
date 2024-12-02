<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fastfood";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['AvailableUpdate-btn'])) {

    // Check if no availability is selected
    if (empty($_POST['availableUpdate'])) {
        header("location: /fastfood/index.php");
        exit;
    } else {
        // Retrieve selected roster IDs and staff ID from POST data
        $rosterAvailable_ID = $_POST['availableUpdate'];
        $staffid = $_POST['staffid'];

        // Loop through the selected roster IDs and insert into Availability table
        for ($x = 0; $x < count($rosterAvailable_ID); $x++) {
            $rosterid = $rosterAvailable_ID[$x]; // Extract current roster ID
            $sql = "INSERT INTO availability (staffid, rosterid) VALUES ('$staffid', '$rosterid')";

            if (!$connection->query($sql)) {
                echo "Error: " . $sql . "<br>" . $connection->error;
                exit;
            }
        }
    }
}

// Redirect to index page after updating the database
header("location: /fastfood/index_navbar.php");
exit;

?>
