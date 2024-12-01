<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
                <li><a href="/anthonyfastfood/create2.php" lass="dropdown-item">Create</a></li>
                <li><a href="/anthonyfastfood/edit2.php" class="dropdown-item">Update</a></li>
                <li><a href="/anthonyfastfood/delete2.php" class="dropdown-item">Delete</a></li>
                </ul>
                </li>

                <li class="nav-item active">
                <a href='/anthonyfastfood/availability2.php' class="nav-link active">
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

</body>
</html>