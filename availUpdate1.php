<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
        <a
            href="#"
            class="navbar-brand mb-0 h1">
            <img
            class="d-inline-block align-top"
            src=""
            width="30" height="'30" />
            Navbar
        </a>

        <button
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        class="navbar-toggler"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="/anthonyfastfood/index.php" class="nav-link">
                        Home
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                    id="navbarDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                        Manage Staff
                    </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="/anthonyfastfood/create.php" lass="dropdown-item">Create</a></li>
                    <li><a href="/anthonyfastfood/edit.php" class="dropdown-item">Update</a></li>
                    <li><a href="/anthonyfastfood/delete.php" class="dropdown-item">Delete</a></li>
                </ul>
                </li>

                <li class="nav-item active">
                    <a href='/anthonyfastfood/availability.php' class="nav-link active">
                        Availability
                    </a>
                </li>

            <li class="nav-item active">
                <a href="/anthonyfastfood/logout.php" class="nav-link active">
                    Logout
                </a>
            </li>  
        </ul>
        </div>
        </div>
    </nav>

    <!-- Check List -->
    <div class="container my-5">
        <h2>Specify Availability</h2>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Roster ID</th>
                    <th>Date Time From</th>
                    <th>Date Time To</th>
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
                $sql = "SELECT * FROM roster";
                $result = $connection -> query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection -> error);
                }

                //Read data of each row
                while($row = $result -> fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[rosterid]</td>
                        <td>$row[datetimefrom]</td>
                        <td>$row[datetimeto]</td>
                    </tr>

                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>