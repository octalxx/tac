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
  
  <link href="../css/stylesheet.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="icon" type="image/ico" href="assets/favicon.ico"/>

</head>

<body class="loggedin">

  <div id="headlogo">
    <a href="../index.html">  
      <img src="../assets/tac-logo.png" alt="logo" class="logo">
    </a>
  </div>

  <div id="link-container">
    <a href="../index.html" class="link_button" id="link">Home</a>
    <a href="../about.html" class="link_button" id="link">About us</a>
    <a href="../products.html" class="link_button" id="link">Products</a>
    <a href="../recommendations.html" class="link_button" id="link">Recommendations</a>
    <a href="../login.html" class="link_button" id="link">Login</a>
    <a href="../register.html" class="link_button" id="link">Register</a>
    <a href="../contact.html" class="link_button" id="link">Contact us</a>
  </div>

  <nav class="navtop">
	<div>
		<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
		<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
	</div>
  </nav>

  <div class="content">
	  <h1>Welcome back, <?=$_SESSION['name']?>!</h1>
    <p>Now that you're logged in, cool huh? Even though databases are pretty boring they make an excellent tool to store your information so we can sell it to the Chinese government. I mean uh... store it according to the GDPR.</p>
  </div>

</body>
</html>