<?php

session_start();
include_once 'connectdb.php';

$id = $_SESSION['id'];

 // kun "valitse tiedosto" -nappia painaa haetaan tiedosto
if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];   // tiedoston nimi
	$fileTmpName = $_FILES['file']['tmp_name'];  // Tiedoston väliaikainen nimi, kun kuva ladataan serverille. 
	$fileSize = $_FILES['file']['size'];    // tiedoston koko
	$fileError = $_FILES['file']['error'];   // tiedosto-error
	$fileType = $_FILES['file']['type'];    // tiedoston tyyppi
	
	$fileExt = explode('.', $fileName);   // explode rikkoo merkkijonon taulukoksi
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpg', 'jpeg', 'png', 'pdf');  // sallitut tiedostomuodot
	
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000){
				$fileNameNew = "profiili".$id.".".$fileActualExt;
				$fileDestination = 'images/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$sql = "UPDATE profileimg SET status = 0 WHERE userid='$id'"; // tiedoston nimi tietokantaan? missä tallennetaan?
				$result = myqli_query($db, $sql);
				header("Location: profiili.php?uploadsuccess");
			}else {
				echo "Tiedosto on liian iso!";
			}
			
		}else {
			echo "Tiedoston lataamisessa oli ongelma!";
		}
		
		}
		else {
			echo "Tiedostomuoto on väärä ladattavaksi!";
		}
}
?>