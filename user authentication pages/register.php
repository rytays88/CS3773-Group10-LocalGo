<?php
session_start();
include("functions.php");                 // functions for DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // check if username exists prior
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if( $user ) {
        $error = "Username already exists.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);        // hash password

        // insert user into database 
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        if( $stmt->execute(['username' => $username, 'password' => $hashedPassword]) ) {
            // redirect to login page after successful registration 
            header("Location: login.php");
            exit();
        } else {
            $error = "Registration failed. Please try again. ";
        }
    }
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register | Music Venue</title>
        <link href="assets/css/style.css" rel="stylesheet"> <!-- same style.css as login page -->
    </head>

    <body>
        <div class="welcome">
            <h3>Welcome to the registration page!</h3>
        </div>
        <div class="container">
            <div class="login-box">
                <h2>Register</h2>
                <form action="register.php" method="POST">
                    <input type="text" id="username" name="username" required placeholder="Username">
                    <input type="password" id="password" name="password" required placeholder="Password">
                    <button type="submit">Register</button>
                </form>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger mt-3"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <p>Already have an account? <a href= "login.html">Login</a></p>
            </div>    
        </div>
    </body>
</html>