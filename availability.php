<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COmpatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Availability</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class= "col-md-12">
                <div class= "card mt-5">
                    <div class= "card-header">
                        <h4>Specify when you are available to work</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class= "col-md-12">
        <div class="card-body">
            <form action= "availUpdate.php" method="POST">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                <button type= "submit" name= "AvailableUpdate-btn"
                                class= "btn btn-primary">Update</button>
                            </th>

                            <th>Staff ID</th>
                            <th>Name</th>
                            <th>RoleID</th>
                            <th>RosterID</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>
                    </tbody>

                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "fastfood";

                        //Create Connection
                        $connection = new mysqli($servername, $username, $password, $database);

                        //Check Connection
                        if ($connection -> connection_error) {
                            die("Connection failed: ").$connection -> connect_error;
                        }
                        
                        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                            //GET method: show the data of the client

                            if (!isset($_GET["staffID"])) {
                                header("location: /fastfood/index.php");
                            }
                            $staffID = $_GET["staffID"];
                        }

                        //Read the row of the selected staff from database table
                        //$sql = "SELECT * FROM staff where staffID=$staffID";

                            $sql = "SELECT staff.staffID, staff.name, staff.roleID, roster.rosterID, roster.dateTimeFrom, Roster.dateTimeTo 
                                    FROM staff
                                    JOIN role ON staff.roleID, = role.roleID 
                                    JOIN rosterRole ON role.roleID = rosterRole.roleID
                                    JOIN roster ON rosterrole.rosterID = roster.rosterID
                                    WHERE staff.staffID = $staffID
                                    ORDER BY roster.dateTimeFrom";
                            
                            $result = $connection -> query($sql);

                            //don't seem to work
                            if (empty($result)) {
                                echo( "nothing" );
                                header("location: /fastfood/index.php");
                                exit;
                            }
                            
                            foreach ($result as $row) {
                            ?>

                                <tr>
                                    <td style= "width:10px; text-aligh; center;">
                                    <input type= "checkbox" 
                                     name= "availableUpdate[]"
                                     value= "<?= $row['rosterID']; ?>">

                                     <td><?= $row['staffID']; ?></td>
                                     <td><?= $row['name']; ?></td>
                                     <td><?= $row['roleID']; ?></td>
                                     <td><?= $row['dateTimeFrom']; ?></td>
                                     <td><?= $row['dateTimeTo']; ?></td>
                                </tr>

                            <?php

                            ?>
                            
                                <!--ensure that staffID is also passed to availUpdate.php via hidden input type -->
                                <input type= "hidden" name="staffID" value="<?php echo $staffID; ?>">
                                
                                <?php
                                
                                }

                            ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>

</html>