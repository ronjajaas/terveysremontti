<?php //start the Session

session_start();
require('connectdb.php');
	// if the form is submitted or not
	// if the form is submitted
if (isset($_POST['salasana'])){
	// assigning posted values to variables
$email = $_POST['email'];
$salasana = $_POST ['salasana'];
	// checking if the values exist in DB or not
$query = "SELECT * FROM 'kayttaja' WHERE email='$email' and salasana ='$salasana'";

$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
$count = mysqli_num_rows($result);

	// if the posted values are equal to the DB values, session will be created
	
if ($count == 1) {
	$SESSION['email'] = $email;
}
else {
	// error message if the credentials don't match
	$errmsg = "Väärä salasana tai käyttäjätunnus";
}	
}

	// if the user is logged in greet with a message
if (isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	
	echo "Olet kirjautunut sisään";
	
}
else {
	
}
?>