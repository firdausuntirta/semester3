<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - UTS - FIRDAUS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            transition: background-image 0.5s ease;
        }

        .card {
            max-width: 500px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .theme-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
            z-index: 10;
            font-size: 1.5rem;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 50%;
            padding: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }

        .btn-danger {
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-danger:hover {
            background-color: #d9534f;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card-footer {
            background-color: #f8f9fa;
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div id="themeToggle" class="theme-icon">
        <i id="themeIcon" class="bi bi-sun"></i>
    </div>

    <div class="container mt-5">
        <div class="card text-center shadow-lg p-3 mb-5 bg-body rounded">
            <div class="card-header bg-primary text-white">
                <h2>Dashboard</h2>
            </div>
            <div class="card-body">
                <h4 class="card-title">Welcome, <?php echo htmlspecialchars($_SESSION["username"]) . " - " . htmlspecialchars($_SESSION["nama"]); ?>!</h4>
                <p class="card-text">Sukses Login</p>
                <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>