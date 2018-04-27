
<?php 
/* Main page with two forms: sign up and log in */
session_start();
$db = mysqli_connect('127.0.0.1:49207', 'azure', '6#vWHD_$', 'terveysremontti');
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

    <title>Muokkaa profiilia - Terveysremontti</title>
</head>

<body>

<?php
	if ( $_SESSION['logged_in'] != 1 ) {
		$_SESSION['message'] = "Sinun pitää olla kirjautuneena sisälle voidaksesi muokata profiili-sivuasi!"; // viesti, joka näytetään error-sivulla
		header("location: error.php"); // käyttäjä ohjataan error-sivulle   
	}

    else if (isset($_POST['update'])) {

        $email = $_SESSION['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
            
        $sql = "UPDATE accounts SET phone='$phone', address='$address' WHERE email='$email'";

        $result = mysqli_query($db, $sql);

        $success = "Tiedot päivitetty onnistuneesti";
           
    }
?>

<div class="jumbotron">
    <div class="container">
    	<h1>Muokkaa tietoja</h1>

		<form method="post" action="<?php $_PHP_SELF ?>">
            <div class="form-group row">
    			<label for="staticEmail" class="col-sm-2 col-md-1 col-form-label">Puhelin</label>
    			<div class="col-6">
      				<input name="phone" id="emp_id" type="text" class="form-control">
    			</div>
  			</div>
  			<div class="form-group row">
    			<label for="staticEmail" class="col-sm-2 col-md-1 col-form-label">Osoite</label>
    			<div class="col-6">
      				<input name="address" id="emp_salary" type="text" class="form-control">
    			</div>
  			</div>
  			<div class="form-group row">
  				<div class="col-sm-2 col-md-1"></div>	
	  			<div class="col-2 col-md-2 col-lg-1">
	    			<button name="update" id="update" type="submit" class="btn btn-light">Lähetä</button>
	    		</div>
	    		<div class="col-2 col-md-2 col-lg-1">
	    			<a class="btn btn-link" href="profiili.php" role="button">Palaa takaisin</a>
	    		</div>
  			</div>                 
        </form>

        <p><?php echo $success ?></p>
	</div>
</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>