<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "roster");

if(isset($_POST["AvailableUpdate_btn"]))
{
    $all_id = $_POST["availability_update_id[]"];
    $extract_id = implode(',', $all_id);
    
    $query = "DELETE FROM roster WHERE rosterid IN($extract_id)";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Availability Updated Successfully";
        header("Location: /fastfood/availaility_y.php");
    }

    else
    {
        $_SESSION['status'] = "Availability Update Failed";
        header("Location: /fastfood/availaility_y.php");
    }
}