<?php 
 $mysqli = new mysqli("localhost", "root", "", "control_vet");
 if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }else{
    $id = $_POST["id"];
    $query=$mysqli->query("DELETE FROM `clinic_history` WHERE `pet`='$id'");
    if (!$query) {
      echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
    }else{
      $query2 = $mysqli->query("DELETE FROM `pets` WHERE `id`='$id'");
      if (!$query2) {
          echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
        }else{
            header("location:../FrontEnd/vistaMascotas.php");
        }
      }
  }
?>