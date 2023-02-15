<?php
$mysqli = new mysqli("mysql://root:YZv9j9VAjnUf4jAOpYvo@containers-us-west-36.railway.app:7635/railway", "root","", "control_vet");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }else{
    $name= $_POST["name"];
    $breed=$_POST["petBreed"];
    $gender=$_POST["gender"];
    $owner = $_POST["owner"];
      $query = $mysqli->query("INSERT INTO `pets`(`id`, `name`, `race`, `gender`, `owner`) VALUES (NULL,'$name','$breed','$gender','$owner')");
      if (!$query) {
          echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
        }else{
        $currentDate = date('Y-m-d H:i:s');
        $query2 = $mysqli->query("INSERT INTO `clinic_history`(`id`,`date`, `pet`) VALUES (NULL,'$currentDate',(SELECT MAX(id) FROM `pets`))");
        if (!$query2) {
            echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
          }else{
              header("location:../FrontEnd/vistaMascotas.php");
          }
        }
  }
?>  