<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="../../assets/css/main.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
</head>
<body>

<div class="main-header">
    <!-- Navbar Header -->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">INFORSArchive</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../../logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout <i class='bx bx-log-out'></i></a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link active">|</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link active">Email: <?=$_SESSION['email'];?></span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rEi5Qmix1bU3TRjrxK5fZDrNCeGlJx7jGmR6sk3lR0W1x4in1Oc2U0W+7LX3YVrV" crossorigin="anonymous"></script>

</body>
</html>
