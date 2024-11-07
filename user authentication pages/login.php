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

    if( $user && password_verify($password, $user['password'] )) {
        // pass is correct, set session and redirect to dashboard
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // added remember me functionality 
        if( isset($_POST['rememberMe']) ) {
            setcookie("username", $username, time() + (86400 * 30), "/");   //set cookie that lasts for 30 days
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
</head>

<body>
	<div class="welcome">
		<h3>Welcome to the login page!</h3>
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
