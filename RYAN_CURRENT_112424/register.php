<?php
session_start();
require_once("functions.php");                 // functions for DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if( !$username || !$email || !$password ) {
        $error = "All fields are required and email must be valid.";
    } else {

        // check if username or email exists prior
        $stmt = $pdo->prepare("SELECT * FROM User WHERE user_name = :username OR user_email = :email");
        $stmt->execute(['username' => $username, 'email' => $email]);
        $user = $stmt->fetch();

        if( $user ) {
            $error = "Username already exists.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);        // hash password
            $currentTimestamp = date('Y-m-d H:i:s');    // get current timestamp

            // insert user into database 
            $stmt = $pdo->prepare("INSERT INTO User (user_name, user_password_hash, user_email, user_role, created_at, updated_at) 
                                    VALUES (:username, :password, :email, 'user', :created_at, :updated_at)");
            if( $stmt->execute([
                'username' => $username, 
                'password' => $hashedPassword,
                'email' => $email,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ]) ) {
                $_SESSION['registration_success'] = "Registration successful! You can now log in.";
            
                // redirect to login page after successful registration 
                header("Location: login.php");
                exit();
            } else {
                $error = "Registration failed. Please try again. ";
            }
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
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/justified-nav.css" rel="stylesheet">
        <link href="assets/css/styles.css" rel="stylesheet"> 
    </head>

    <body>
        <div class="container-fluid">
            <div class="header masthead">
                <h3 class="text-muted">Register</h3>
                <nav>
                    <ul class="nav nav-justified">
                        <li class="nav-item "><a class="nav-link" href="home.php">HOME</a></li>
		                <li class="nav-item"><a class="nav-link" href="about.php">ABOUT US</a></li>
		                <li class="nav-item"><a class="nav-link" href="location.php">Location</a></li>

                        <?php if (isset($_SESSION['user_id'])): ?>
                            <!-- Show Logout if user is logged in -->
                            <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
                        <?php else: ?>
                            <!-- Show Login if user is not logged in -->
                            <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
                        <?php endif; ?>   
                    </ul>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="login-box">
                <h2>Register</h2>
                <form action="register.php" method="POST">
                    <input type="text" id="username" name="username" required placeholder="Username">
                    <input type="email" id="email" name="email" required placeholder="Email">
                    <input type="password" id="password" name="password" required placeholder="Password">
                    <button type="submit">Register</button>
                </form>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger mt-3"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <p>Already have an account? <a href= "login.php">Login</a></p>
            </div>    
        </div>
    </body>
</html>