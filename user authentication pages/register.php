<?php
session_start();
//include("functions.php");                 // functions for DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
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
            $_SESSION['registration_success'] = "Registration successful! You can now log in below.";
            
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
                        <li class="nav-item "><a class="nav-link" href="sampleindex.php">HOME</a></li>
		                <li class="nav-item"><a class="nav-link" href="about.html">ABOUT US</a></li>
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