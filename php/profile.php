<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  
  <link href="../css/stylesheet.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
      <a href="../login.html" class="link_button" id="link">Login</a>
      <a href="../register.html" class="link_button" id="link">Register</a>
      <a href="../contactus.html" class="link_button" id="link">Contact us</a>
    </div>
  </nav>
  <nav class="navtop">
	<div>
	    <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
		<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
	</div>
  
  <div class="content">

	<div>
	  <p>Your account details are below:</p>
	  <table>
		<tr>
		  <td>Username:</td>
		  <td><?=$_SESSION['name']?></td>
		</tr>
		<tr>
		  <td>Password:</td>
		  <td><?=$password?></td>
		</tr>
		<tr>
		  <td>Email:</td>
		  <td><?=$email?></td>
		</tr>
	  </table>
	</div>

  </div>

</body>
</html>