<?php 
 $mysqli = new mysqli("localhost", "root", "", "control_vet");
 if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }else{
    $id = $_POST["id"];
      $query = $mysqli->query("DELETE FROM `records` WHERE `id`='$id'");
      if (!$query) {
          echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
        }else{
            header("location:../FrontEnd/vistaReportes.php");
        }
  }
?>