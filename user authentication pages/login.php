<?php
session_start();
//include("functions.php");                 // functions for DB connection

if(isset($_SESSION['registration_success'])) {
    $successMessage = $_SESSION['registration_success'];
    unset($_SESSION['registration_success']);   // clear message after display
}

if(isset($dbConnectionError)) {
    echo "<div class = 'alert alert-danger mt-3'>$dbConnectionError</div>";
    exit();     // prevent further code xecutuion if DB connection failed
}

if( isset( $_SESSION['user_id'] ) ) {
    header("Location: sampleindex.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    // check if username exists prior
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if( $user && password_verify($password, $user['password'] )) {
        // regenerate session ID to prevent session fixation
        //session_regenerate_id(true);
        
        // pass is correct, set session and redirect to dashboard
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // added remember me functionality 
        if( isset($_POST['rememberMe']) ) {
            setcookie("username", $username, time() + (86400 * 30), "/", "", true, true);   //set cookie that lasts for 30 days
        }
        header("Location: sampleindex.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
	<link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/justified-nav.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet"> 
    <style>
        .container { max-width: 400px; margin-top: 50px; }
        .header_masthhead { margin-bottom:30px; }
    </style>
</head>

<body>
<div class="container-fluid">
    <div class="header masthead">
        <h3 class="text-muted">Login</h3>
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
		<h2>Login</h2>
		<form action="login.php" method="POST"> <!--# is where the data is going to be sent, need to change this later!-->
			<input type="text" id="username" name="username" required placeholder="Username"
                value="<?= isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : '' ?>"> 
            <input type="password" id="password" name="password" required placeholder="Password">
			<div class="options">
				<input type="checkbox" id="rememberMe" name="rememberMe">
				<label for="rememberMe">Remember me</label>
				<a href="#">Forgot Password?</a> 									<!--change # to the page you want to go to!-->
			</div>
			<button type="submit">Login</button>
                
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger mt-3"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
				
            <p>Don't have an account? <a href="register.php" id="register">Register</a></p> 	<!--change # to the page you want to go to!-->
        </form>
	</div>
</div>
</body>
</html>
