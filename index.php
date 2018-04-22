<?php 
/* Main page with two forms: sign up and log in */
require 'connectdb.php';
session_start();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Hello, world!</title>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'loginEve.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>

<body id="myPage">


<nav id="topnav" class="navbar topnav fixed-top justify-content-center bg-light">
	<ul class="nav">
		<li class="nav-item"><a class="nav-link" href="#terveysremontti">Terveysremontti</a></li>
		<li class="nav-item"><a class="nav-link" href="#ajankohtaista">Ajankohtaista</a></li>
		<li class="nav-item"><a class="nav-link" href="#hinnasto">Hinnasto</a></li>
		<li class="nav-item"><a class="nav-link" href="#yritys">Yritys</a></li>
		<li class="nav-item"><a class="nav-link" href="#yhteys">Yhteystiedot</a></li>
	</ul>
</nav>

<div data-spy="scroll" data-target="#topnav" data-offset="45" class="scroll">

	<div class="container-fluid kirjautuminen">
		<div class="container">
			<div class="row">
				<div class="col"></div>
				<div class="col-md-9">
					<form action="index.php" method="post" autocomplete="off">
						<div class="row">
							<div class="col-md-3 text-right">
								<small><a href="forgot.php">Unohtuiko salasana?</a></small>
							</div>
							<div class="col-md-3">
								<input type="email" class="form-control form-control-sm" placeholder="esimerkki@email.com" name="email" autocomplete="off" required>
							</div>
							<div class="col-md-2">
								<input type="password" class="form-control form-control-sm" placeholder="Salasana" name="Salasana" autocomplete="off" required>
							</div>
							<div class="col-md-2">
								<button class="btn btn-success btn-sm" name="login">Kirjaudu sisään</button>
							</div>
							<div class="col-md-2 reuna">
								<a class="btn btn-light btn-sm" href="rekisteroidy.php" role="button">Rekisteröidy</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="kuvat/puuro.jpg" alt="First slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>Energiaa päivääsi!</h5>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="kuvat/smoothie.jpg" alt="Second slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>Hyvää oloa ja vireyttä koko kehoon!</h5>
				</div>
	    	</div>
	    	<div class="carousel-item">
				<img class="d-block w-100" src="kuvat/veget.jpg" alt="Third slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>Herkullisia reseptejä!</h5>
				</div>
	    	</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<div id="terveysremontti" class="juksu"></div>

	<div class="jumbotron">
		<div class="container">
			<h1>Terveysremontti</h1>
			<p class="lead">Pysyviä muutoksia elintapoihisi. </p>
			<hr class="my-4">
			<p>Tie parempien elintapojen luo ei ole koskaan helppo, mutta sen kulkeminen sujuu huomattavasti paremmin yhdessä muiden samassa tilanteessa olevien kanssa. Myös valmentajasi tukee sinua koko matkan ajan ja auttaa sinua saavuttamaan tavoitteesi.</p>
		</div>
	</div>

	<div id="ajankohtaista" class="juksu"></div>

	<div class="ajankohtaista container">
		<div class="row"><div class="col-md-12"><h1>Ajankohtaista</h1></div></div>
		<div class="row">
			<div class="col-md-6">

	<img src="kuvat/apple.jpg" class="img-fluid img-thumbnail" alt="Responsive image">
	<h4>Uutiset</h4>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis dignissim nisi. Duis a turpis vitae velit gravida convallis. </p>

			</div>
			<div class="col-md-6">

	<img src="kuvat/tomato.jpg" class="img-fluid img-thumbnail" alt="Responsive image">
	<h4>Tarjoukset</h4>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis dignissim nisi. Duis a turpis vitae velit gravida convallis. </p>

			</div>
		</div>
	</div>

	<div id="hinnasto" class="juksu"></div>

	<div class="hinnasto container">
		<div class="row">
			<div class="col">
				<h1>Hinnasto</h1>

				<p>Valittavana yksilö- ja ryhmäohjaus, kehonkoostumusanalyysit, ruokavalio ja ruokavalion uusiminen.</p> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">Analyysi</div>
					<ul class="list-group list-group-flush">
				    	<li class="list-group-item">Kehonkoostumisanalyysi</li>
				    	<li class="list-group-item hinta">40€</li>
					</ul>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">Ruokavalio</div>
					<ul class="list-group list-group-flush">
				    	<li class="list-group-item">Uusi ruokavalio ja kaksi (2) kehonkoostumusanalyysia.</li>
				    	<li class="list-group-item hinta">125€</li>
					</ul>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">Terveysremontti 3kk</div>
					<ul class="list-group list-group-flush">
				    	<li class="list-group-item">Kolme (3) kuukautta ryhmäohjausta.</li>
				    	<li class="list-group-item hinta">165€</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="yritys" class="juksu"></div>

	<div class="yritys container">
		<div class="row"><div class="col"><h1>Valmentajat Eve ja Hannu</h1></div></div>
		<div class="row">
			<div class="col">

			<p class="text-center"><img src="kuvat/profile.png" class="img-thumbnail rounded-circle" alt="eve"></p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			</div>
			<div class="col">

			<p class="text-center"><img src="kuvat/profile.png" class="img-thumbnail rounded-circle" alt="hannu"></p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			</div>
		</div>
	</div>

	<div id="yhteys" class="juksu"></div>

	<div class="jumbotron yhteys">
	 	<div class="container">
			<h1>Yhteystiedot</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		</div>
	</div>

</div>

<footer class="container-fluid text-center padding">
	<a href="#myPage" title="To Top">
		<i class="fa fa-angle-up" style="font-size:24px"></i>
	</a>
</footer>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>
