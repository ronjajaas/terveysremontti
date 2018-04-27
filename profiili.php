<?php

session_start();

// Muodosta yhteys tietokantaan
  $db = mysqli_connect('127.0.0.1:49207', 'azure', '6#vWHD_$', 'terveysremontti');
  
// Tarkistaa, onko käyttäjä kirjautuneena sisälle
// käyttäjä ei ole kirjautuneena sisälle:
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Sinun pitää olla kirjautuneena sisälle voidaksesi tarkastella profiili-sivuasi!"; // viesti, joka näytetään error-sivulla
  header("location: error.php"); // käyttäjä ohjataan error-sivulle   
}
// käyttäjä on kirjautuneena sisälle:
else {

    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $phone = $_SESSION['phone'];
    $address = $_SESSION['address'];
}

	$sql = "SELECT * FROM accounts";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {  // fetches a result row as an associative array
			$id = $row['id'];  // tarkista onko sama accounts taulussa
			$sqlImg = "SELECT * FROM profileimg WHERE id= '$id'";
			$resultImg = mysqli_query($db, $sqlImg);
			while ($rowImg = mysqli_fetch_assoc($resultImg)) {
					
			}
		}
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

    <title>Hello, world!</title>
</head>

<body>

<nav id="topnav" class="navbar topnav fixed-top justify-content-center bg-light">
	<ul class="nav">
		<li class="nav-item"><a class="nav-link" href="index.php">Etusivu</a></li>
		<li class="nav-item"><a class="nav-link active" href="profiili.php">Profiili</a></li>
		<li class="nav-item"><a class="nav-link" href="#hinnasto">Verkkokauppa</a></li>
	</ul>
</nav>

<div class="profiili container">
	<div class="row">
		<div class="col-md-12"><h1><?php echo $firstName.' '.$lastName; ?> <span class="text-muted"><i class="fa fa-unlock-alt"></i> <a name="logout" href="logout.php">Kirjaudu ulos</a></span></h1></div>
		
		<form action="upload.php" method="POST" enctype="multipart/form-data">
		
		<div class="col-md-3">
		<?php 
		if ($rowImg['status'] == 0) {
			 echo "<img src='images/profiili".$id.".jpg' class='img-thumbnail' alt='Responsive image'>";
		}
		else {
			echo "<img src='kuvat/profile.png' class='img-thumbnail' alt='Responsive image'>";
		}
		?>
		
		</div>
		<input type="file" name="file">
		<button type="submit" name="submit">Lataa profiilikuva</button>
		</form>
		
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