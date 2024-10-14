<?php
include_once "connect.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No user found with that username.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('https://www.causeartist.com/content/images/wp-content/uploads/2023/07/non-toxic-perfume-brands.png'); /* Replace 'background.jpg' with your actual background image path */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .container {
            display: flex;
            height: 100vh;
            padding-right: 30px;
            margin-top: 50px;
            margin: 30px;
        }

        .wide-card {
            border-radius: 10px;
            max-width: 300px;
            background-color: rgba(255, 255, 255, 0.7);
        }

        .header {
            background-color: #1e2520;
            color: white;
            text-align: center;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 25px;
            padding: 10px 0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-content {
            padding: 20px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .login-button {
            color: #eff3f0;
            background-color: rgb(41, 14, 196);
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid rgb(41, 14, 196); /* Set border color explicitly */
        }

        .input-label {
            margin-bottom: 5px;
            color:black;
        }

        .input-field {
            margin-bottom: 10px;
            padding: 10px;
            width: 100%;
            border-color:none;
        }

        .yel {
            color: rgb(41, 14, 196);
            font-size: 25px;
        }

        .title {
            margin: 30px;
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            margin-top: 50px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .message {
            margin: 30px;
            font-size: 16px;
            color: #1e2520;
            margin-bottom: 20px;
        }
        .message1 {
            margin: 10px;
            font-size: 14px;
            color: #1e2520;
            margin-bottom: 20px;
        }
        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2 class="title">Scent Sanctuary Admin Page</h2> 
    <div class="message">Welcome to the Scent Sanctuary Admin Portal. <br>Please log in to manage the system. Just enter your username and password to continue.</div>
    <div class="container">
        <form action="login.php" method="post">
            <div class="wide-card"> 
                <h2 class="header">Admin <span class="yel">Login</span></h2>
                <div class="card-content">
                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-danger"><?= $error_message ?></div>
                    <?php endif; ?>
                    <label for="username" class="input-label">Username</label>
                    <input type="text" name="username" id="username" required class="input-field" placeholder="Enter your Username">
                    
                    <label for="password" class="input-label">Password</label>
                    <input type="password" name="password" id="password" required class="input-field" placeholder="Enter your Password">
                    <button type="submit" class="login-button">Login</button>
                    <div class="message1">Forgot your password? Click here to reset it.</div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
