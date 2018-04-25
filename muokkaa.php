
<?php 
/* Main page with two forms: sign up and log in */
require 'connectdb.php';
session_start();
?>
<!doctype html>
<html lang="fi">
<head>
	<title>Moro</title>
</head>
<body>

      <?php
         if(isset($_POST['update'])) {

         	$email = $_SESSION['email'];

            $phone = $_POST['phone'];
            $address = $_POST['address'];
            
            $sql = "UPDATE accounts SET phone = $phone, address = $address WHERE email = $email" ;

            echo "Updated data successfully\n";
           
         }

         else {
            ?>

            <form method="post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Puhelin</td>
                        <td><input name="phone" type="text"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Osoite</td>
                        <td><input name="address" type="text"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name="update" type="submit" id="update" value="Update">
                        </td>
                     </tr>
                  
                  </table>
            </form>

               <?php
         }
      ?>

<a href="profiili.php">Palaa takaisin</a>

</body>
</html>