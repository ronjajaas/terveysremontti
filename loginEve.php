<?php
/* Käyttäjän kirjautuminen. Tarkistaa onko käyttäjää olemassa ja onko salasana oikein. */

$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'");

// Kun käyttäjää ei ole olemassa:
if ( $result->num_rows == 0 ){ 
    $_SESSION['message'] = "Käyttäjää tällä sähköpostilla ei ole olemassa!"; // viesti, joka näytetään error-sivulla.
    header("location: error.php"); // käyttäjä ohjataan error-sivulle.
}

// Kun käyttäjä on olemassa:
else { 
    $user = $result->fetch_assoc();

    // jos salasana on oikein:
	if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['lastName'] = $user['lastName'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['address'] = $user['address'];
        $_SESSION['active'] = $user['active'];
        
        // Tällä varmistetaan onko käyttäjä kirjautuneena sisälle. 
        $_SESSION['logged_in'] = true;

        // Kun käyttäjä on kirjautunut, hänet ohjataan profiili.php:seen.
        header("location: profiili.php");
    }

    // jos salasana ei ole oikein:
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!"; // viesti, joka näytetään error-sivulla
        header("location: error.php"); // käyttäjä ohjataan error-sivulle. 
    }
}