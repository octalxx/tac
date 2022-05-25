<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="styles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <div id="headlogo">
            <a href="index.html">  
                <img src="tac-logo.png" alt="logo" class="logo">
            </a>
        </div>
		<div id="link-container">
        <a href="index.html" id="link">Home</a>
        <a href="about.html" id="link">About us</a>
        <a href="products.html" id="link">Products</a>
        <a href="login.html" id="link">Login</a>
        <a href="register.html" id="link">Register</a>
        <a href="contactus.html" id="link">Contact us</a>
      </div>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>TAC Admin Page</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>