<?php
session_start();

$db = mysqli_connect('127.0.0.1:49207', 'azure', '******', 'terveysremontti');

$email = $_SESSION['email'];
$sql = "SELECT * FROM accounts WHERE email='$email'";
$result = $db->query($sql);


if (mysqli_num_rows($result) > 0) {

    // fetches a result row as an associative array
    while ($row = mysqli_fetch_assoc($result)) {  
      $id = $row['id'];  // tarkista onko sama accounts taulussa
      $sqlImg = "SELECT * FROM profileimg WHERE id= '$id'";
      $resultImg = mysqli_query($db, $sqlImg);
      while ($rowImg = mysqli_fetch_assoc($resultImg)) {}
    }
}
?>
	
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
</head>
<body>


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

</body>
</html>
