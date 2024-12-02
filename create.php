<!-- Submit to DB -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fastfood";

// Create Connection
$connection = new mysqli($servername, $username, $password, $database);

$name="";
$address="";
$dateofbirth="";
$email="";
$mob="";
$roleid="";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $dateofbirth = $_POST["dateOfBirth"];
    $email = $_POST["email"];
    $mob = $_POST["mob"];
    $roleid = $_POST["roleID"];

    do {
        if ( empty($name) || empty($address) || empty($dateofbirth) || empty($email) || empty($mob) || empty($roleid)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // Add New Staff to DB
        $sql = "INSERT INTO staff(name, address, dateOfBirth, email, mob, roleID) " .
               "VALUES ('$name', '$address', '$dateofbirth', '$email', '$mob', '$roleid')";
        $result = $connection -> query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $name="";
        $address="";
        $dateofbirth="";
        $email="";
        $mob="";
        $roleid="";

        $successMessage = "Staff added successfully";

        header("location: /fastfood/index.php");
        exit;

    } while (false);
}
?>

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

    <div class="container my-5">
        <h2>New Staff</h2>

<!-- Error Message -->
        <?php
        if ( !empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

<!-- Create New Staff -->
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date of Birth</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="dateOfBirth" value="<?php echo $dateofbirth; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Mob</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="mob" value="<?php echo $mob; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Role ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="roleID" value="<?php echo $roleid; ?>">
                </div>
            </div>

<!-- Success Message -->
            <?php
            if ( !empty($successMessage) ) {
                echo "
                <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            }
            ?>

<!-- Submit Cancel Button -->
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/fastfood/index.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>
</html>