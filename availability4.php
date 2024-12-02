<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Availability</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Specify when you are available to work</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card-body">
                    <form action="availUpdate.php" method="POST">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><button type="submit" name="AvailableUpdate-btn" class="btn btn-primary">Update</button></th>
                                    <th>StaffID</th>
                                    <th>Name</th>
                                    <th>RoleID</th>
                                    <th>RosterID</th>
                                    <th>Start</th>
                                    <th>End</th>
                                </tr>
                            </thead>
                            <tbody>
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

                                // Check if staffID is set
                                if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["staffid"])) {
                                    $staffID = $_GET["staffid"];

                                    // Fetch availability data for the specified staffID
                                    $sql = "
                                        SELECT 
                                            staff.staffid, staff.name, staff.roleid, 
                                            roster.rosterid, roster.datetimefrom, roster.datetimeto
                                        FROM 
                                            staff
                                        JOIN role ON staff.roleid = role.roleid
                                        JOIN rosterrole ON role.roleid = rosterrole.roleid
                                        JOIN roster ON rosterrole.rosterid = roster.rosterid
                                        WHERE 
                                            staff.staffid = $staffid
                                        ORDER BY 
                                            roster.datetimefrom
                                    ";

                                    $result = $connection->query($sql);

                                    // Check if any data is returned
                                    if ($result && $result->num_rows > 0) {
                                        foreach ($result as $row) {
                                            echo "<tr>
                                                <td style='width:10px; text-align:center;'>
                                                    <input type='checkbox' name='availableUpdate[]' value='{$row['rosterid']}'>
                                                </td>
                                                <td>{$row['staffid']}</td>
                                                <td>{$row['name']}</td>
                                                <td>{$row['roleid']}</td>
                                                <td>{$row['rosterid']}</td>
                                                <td>{$row['datetimefrom']}</td>
                                                <td>{$row['datetimeto']}</td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No availability records found for the selected staff.</td></tr>";
                                    }
                                    // Pass staffID to availUpdate.php
                                    echo "<input type='hidden' name='staffid' value='{$staffid}'>";
                                } else {
                                    header("location: /fastfood/index.php");
                                    exit;
                                }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
