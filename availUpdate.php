<?php session_start(); ?>

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
    <div class="container">
        <div class="row justify-content-center">
            <div class= "col-md-12">
                <div class= "card mt-5">
                    <div class= "card-header">
                        <h4>Specify when you are available to work</h4>
                    </div>
                </div>
            </div>


            <div class= "col-md-12">
                <div class="card mt-4"></div>
                    <div class="card-body">
                        <form action= "code.php" method="POST">
                            <table class="table table-bordered table-striped">
                                <!--Roster Shift Table -->
                                <tbody>
                                    <tr>
                                        <th>
                                        <button type= "submit" name= "AvailableUpdate_btn"
                                        class= "btn btn-primary">Update</button>
                                        </th>
                                        <th>Roster ID</th>
                                        <th>Date Time From</th>
                                        <th>Date Time To</th>
                                    </tr>
                                </tbody>

                                <!--  -->
                                <tbody>
                                    <?php
                                        $con = mysqli_connect("localhost", "root", "", "fastfood");

                                        $query = "SELECT * FROM roster";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                 <tr>
                                                    <td style="width:10px; text-align: center;">
                                                    <input type="checkbox" name="availability_update_id[]" value="<?= $row['rosterid'] ?>">
                                                    </td>
                                                    <td><?= $row['rosterid'] ?></td>
                                                    <td><?= $row['datetimefrom'] ?></td>
                                                    <td><?= $row['datetimeto'] ?></td>
                                                </tr>
       
                                                <?php

                                            }
                                        }    
                                        ?>
                                    </tbody>

</body>
</html>
