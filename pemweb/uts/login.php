<?php
session_start();

$users = [
    ["username" => "admin", "password" => "admin", "nama" => "Admin"],
    ["username" => "firdaus", "password" => "oke123", "nama" => "Firdaus"],
    ["username" => "firdaus1", "password" => "firdaus1", "nama" => "Firdaus Satrio"],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    $login_success = false;

    foreach ($users as $user) {
        if ($input_username === $user['username'] && $input_password === $user['password']) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            $login_success = true;
            header('Location: dashboard.php');
            exit();
        }
    }

    if (!$login_success) {
        echo "<script>alert('Username atau password salah!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UTS - FIRDAUS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-image: url("../images/night.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-image 0.5s ease;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 350px;
            text-align: center;
        }

        #themeToggle {
            position: fixed;
            top: 20px;
            left: 20px;
            cursor: pointer;
            z-index: 1000;
            font-size: 1.5rem;
            color: black;
            background-color: whitesmoke;
            border-radius: 50%;
            padding: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }

        .theme-icon {
            display: inline-block;
            font-size: 1.5rem;
        }

        .theme-icon:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body>
    <div id="themeToggle" class="theme-icon">
        <i id="themeIcon" class="bi bi-sun"></i>
    </div>

    <div class="container mt-5">
        <h1>Login</h1>
        <p>Masukkan username dan password anda untuk masuk.</p>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <div class="mt-3">
            <a href="register.php" class="btn btn-secondary">Register</a>
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>