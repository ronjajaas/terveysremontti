<?php 
/* Tarkistaa rekisteröidyn käyttäjän sähköpostin,
    linkki sivulle on sisällytetty registerEve.php:n sähköpostiviestiin */

require 'connectdb.php';
session_start();

// Tarkistaa, ettei sähköpostin ja hashin muuttujat ole tyhjiä
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    
    // Valitsee käyttäjän, joka ei ole vielä aktivoinut tunnustaan, yhteensopivan sähköpostin ja hashin perusteella
    $result = $mysqli->query("SELECT * FROM accounts WHERE email='$email' AND hash='$hash' AND active='0'");

    // jos käyttäjä on jo aktivoitu
    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Käyttäjä on jo aktivoitu tai osoite on virheellinen!";

        header("location: error.php");
    }

    // jos käyttäjää ei ole aktivoitu
    else {
        $_SESSION['message'] = "Tunnuksesi on nyt aktivoitu!";
        
        // Asettaa käyttäjän aktiiviseksi tietokantaan
        $mysqli->query("UPDATE accounts SET active='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['active'] = 1;
        
        header("location: success.php");
    }
}

// jos sähköpostin ja/tai hashin muuttujat ovat tyhjiä
else {
    $_SESSION['message'] = "Virheelliset parametrit, jotka on annettu tilin vahvistamiseen!";
    header("location: error.php");
}     
?>