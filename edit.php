<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fastfood";

// Create Connection
$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$address = "";
$dateofbirth = "";
$email = "";
$mob = "";
$password = "";
$roleid = "";
$staffid = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: Show the data of the client
    if (!isset($_GET["staffid"])) {
        header("location: /fastfood/index.php");
        exit;
    }

    $staffid = $_GET["staffid"];
    // Read the row of the selected staff from database table
    $sql = "SELECT * FROM staff WHERE staffid = $staffid";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /fastfood/index.php");
        exit;
    }

    $name = $row["name"];
    $address = $row["address"];
    $dateofbirth = $row["dateofbirth"];
    $email = $row["email"];
    $mob = $row["mob"];
    $password = $row["password"];
    $roleid = $row["roleid"];
} else {
    // POST method: Update the data of the client
    if (isset($_POST["staffid"])) {
        $staffid = $_POST["staffid"];
    }

    $name = $_POST["name"];
    $address = $_POST["address"];
    $dateofbirth = $_POST["dateofbirth"];
    $email = $_POST["email"];
    $mob = $_POST["mob"];
    $password = $_POST["password"];
    $roleid = $_POST["roleid"];

    do {
        if ( empty($staffid) || empty($name) || empty($address) || empty($dateofbirth) || empty($email) || empty($mob) || empty($password) || empty($roleid) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        // Allow us to update data
        $sql = "UPDATE staff SET 
                    name = '$name', 
                    address = '$address', 
                    dateOfBirth = '$dateofbirth', 
                    email = '$email', 
                    mob = '$mob', 
                    password = '$password', 
                    roleID = '$roleid' 
                WHERE staffid = $staffid";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Staff updated successfully";
        header("location: /fastfood/index.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New Staff</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="staffid" value="<?php echo $staffid; ?>">
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
                    <input type="text" class="form-control" name="dateofbirth" value="<?php echo $dateofbirth; ?>">
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
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Role ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="roleid" value="<?php echo $roleid; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
                ";
            }
            ?>

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