 /* Rekisteröitymisen vaiheet, lisää käyttäjän tiedot tietokantaan ja lähettää sähköpostilla vahvistuksen tunnuksesta  */  
<?php

$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

// Asettaa istunnon muuttujat, joita käytetään profiili.php-sivulla
$_SESSION['email'] = $_POST['email'];
$_SESSION['firstName'] = $_POST['firstName'];
$_SESSION['lastName'] = $_POST['lastName'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['address'] = $_POST['address'];

// Keskeyttää kaikki $_POST muuttujat suojellakseen SQL injektoimiselta
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
$firstName = $mysqli->escape_string($_POST['firstName']);
$lastName = $mysqli->escape_string($_POST['lastName']); 
$phone = $mysqli->escape_string($_POST['phone']);
$address = $mysqli->escape_string($_POST['address']);

      
// Tarkistaa onko käyttäjää kyseisellä sähköpostilla olemassa
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'") or die($mysqli->error()); 

// Tiedämme, että käyttäjän sähköposti on olemassa, jos palautettuja rivejä on enemmän kuin 0
if ( $result->num_rows > 0 ) {         
	$_SESSION['message'] = 'Käyttäjä tällä sähköpostilla on jo olemassa!';
    header("location: error.php");      
} 

// Sähköpostia ei ole valmiiksi olemassa -> mennään eteenpäin
else {   
         
	// aktivoimaton käyttäjä on oletusarvoltaan 0 
	$sql = "INSERT INTO accounts (firstName, lastName, email, address, phone, password, hash) VALUES ('$firstName','$lastName','$email','$address','$phone','$password', '$hash')"; 


	// Lisää käyttäjä tietokantaan
	if ( $mysqli->query($sql) ){         

		$_SESSION['active'] = 0;  // arvo on 0 kunnes käyttäjä aktivoi tunnuksensa verify.php:n avulla
		$_SESSION['logged_in'] = true;  // näin tiedämme, että käyttäjä on kirjautuneena sisään
		$_SESSION['message'] = "Vahvistuslinkki on lähetetty osoitteeseen $email. Ole hyvä ja aktivoi tunnuksesi painamalla linkkiä sähköpostiviestissä.";

		// Lähettää rekisteröitymisen jälkeen vahvistuslinkin (verify.php)
		$to = $email;
		$subject = 'Terveysremontti-tunnuksen aktivointi'; 
		$message_body = '         
		Hei '.$first_name.',          

		Kiitos rekisteröitymisestäsi Terveysremontin käyttäjäksi!         

		Blaa blaa blaa.

		Seuraavaa linkkiä klikkaamalla hyväksyt nämä ehdot ja samalla aktivoit Terveysremontti-käyttäjäsi. 
		http://1700024.azurewebsites.net/verify.php?email='.$email.'&hash='.$hash;

		mail( $to, $subject, $message_body );  // sähköposti lähetetään käyttäjän antamaan osoitteeseen

		header("location: profiili.php");  // käyttäjä ohjataan rekisteröinnin päätteeksi profiili-sivulleen.
	}

	// jos jotain menee pieleen rekisteröitymisessä
	else {         
		$_SESSION['message'] = 'Rekisteröityminen epäonnistui!';         

		header("location: error.php");     
	}  
} 

?>
