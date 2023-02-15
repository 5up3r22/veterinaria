<?php 
$mysqli = new mysqli("localhost", "root","", "control_vet");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }else{
    $id=$_POST["id"];
    $temp= $_POST["temp"];
    $weight=$_POST["weight"];
    $heart=$_POST["heart"];
    $comm=$_POST["comments"];
    $currentDate = date('Y-m-d H:i:s');
            $query=$mysqli->query("UPDATE `records` SET `temp`='".$temp."',`weight`='".$weight."',`heart_frec`='".$heart."',`date`='".$currentDate."',`comments`='".$comm."' WHERE `id`='".$id."'");
      if (!$query) {
          echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
        }else{
            header("location:../FrontEnd/vistaReportes.php");
        }
  }
?>