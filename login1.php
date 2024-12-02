<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>


<body>
	<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-25 my-auto shadow">
				<div class="card-header text-center bg-primary text-white">
					<h2>Login</h2>
				</div>
				<div class="card-body">
					<form action="" method="">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email" class="form-control" name="email" required/>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" class="form-control" name="password" required/>
						</div>
						<input type="submit" class="btn btn-primary w-100" value="Login" name="">
					</form>
				</div>
				<div class="card-footer text-right">
					<small>&copy; Fast Food</small>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Database Connection
    $con = new mysqli("localhost", "root", "", "fastfood");

    if($con->connect_error) {
        die("Failed to connect : ".$con->connect_error);
    } else {
        $stmt = $con->prepare("SELECT * FROM staff WHERE email = ?");
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt_result = $stmt -> get_result();
        if($stmt_result -> num_rows > 0) { 
            $data = $stmt_result -> fetch_assoc();
            if($data['password'] === $password) {
            }  else {
                echo "<h2>Invalid Email or Password</h2>";
            }
        } else {
            echo "<h2>Invalid Email or Password</h2>";
        }
    }
?>