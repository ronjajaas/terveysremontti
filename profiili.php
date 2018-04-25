<?php
/* Displays user information and some useful messages */
session_start();

// Tarkistaa, onko käyttäjä kirjautuneena sisälle

// käyttäjä ei ole kirjautuneena sisälle:
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Sinun pitää olla kirjautuneena sisälle voidaksesi tarkastella profiili-sivuasi!"; // viesti, joka näytetään error-sivulla
  header("location: error.php"); // käyttäjä ohjataan error-sivulle   
}

// käyttäjä on kirjautuneena sisälle:
else {
    // Makes it easier to read
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $phone = $_SESSION['phone'];
    $address = $_SESSION['address'];
}
?>

<!doctype html>
<html lang=fi>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="css/terveysremontti.css" rel="stylesheet" type="text/css">
    <link href="css/profiili.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title><?php echo $firstName.' '.$lastName; ?> - Terveysremontti</title>
</head>

<body>

<nav id="topnav" class="navbar topnav fixed-top justify-content-center bg-light">
	<ul class="nav">
		<li class="nav-item"><a class="nav-link active" href="profiili.php">Profiili</a></li>
	</ul>
</nav>

<div class="profiili container">
	<div class="row">
		<div class="col-md-12"><h1><?php echo $firstName.' '.$lastName; ?> <span class="text-muted"><i class="fa fa-unlock-alt"></i> <a name="logout" href="logout.php">Kirjaudu ulos</a></span></h1></div>
		<div class="col-md-3"><img src="kuvat/profile.png" class="img-thumbnail" alt="Responsive image"></div>
		<div class="col-md-9">
			<h2 class="eka">Perustiedot</h2>

				<table class="table table-hover">
					<thead>
						
					</thead>
					<tbody>
						<tr>
							<th class="leveys">Sähköposti</th>
							<td><?= $email ?></td>
						</tr>
						<tr>
							<th>Puhelin</th>
							<td><?= $phone ?></td>
						</tr>
						<tr>
							<th>Osoite</th>
							<td><?= $address ?></td>
						</tr>
					</tbody>
				</table>

				<p><a href="muokkaa.php">Muokkaa...</a></p>
		</div>
	</div>
</div>

<hr class="container">

<div class="yhteys container">
	<div class="row">
		<div class="col-md-12">
			<h1>Ota yhteyttä Eveen</h1>
		</div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>