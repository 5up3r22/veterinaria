<?php 
$host = 'containers-us-west-36.railway.app';
$port = '7635';
$dbname = 'railway';
$username = 'root';
$password = 'YZv9j9VAjnUf4jAOpYvo';
$mysqli = new mysqli($host, $username, $password, $dbname, $port);

if ($mysqli->connect_errno) {
   echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
 }else{
   $id=$_POST['id'];
      $newName=$_POST['newName'];
     $newPetBreed=$_POST["newPetBreed"];
    $newGender=$_POST['newGender'];
    $newOwner=$_POST['newOwner'];
     $query = $mysqli->query("UPDATE `pets` SET `name`='".$newName."',`race`='".$newPetBreed."',`gender`='".$newGender."',`owner`='".$newOwner."'  WHERE `id`='".$id."'");
     if (!$query) {
         echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
       }else{
           header("location:../FrontEnd/vistaMascotas.php");
       }
 }
?>