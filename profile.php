<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $email = $_SESSION['email'];

}
?>

<html>
<head>
	<title>MORO</title>
</head>
<body>

<h2><?php echo $first_name.' '.$last_name; ?></h2>

<p><?php echo $email ?></p>

<a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

</body>
</html>