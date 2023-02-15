<?php
function tablaHistorias(){

    $mysqli = new mysqli("localhost", "root", "", "control_vet");
    if ($mysqli->connect_errno) {
      echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
      $query = $mysqli->query("SELECT * FROM `clinic_history`");
      if (!$query) {
        echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
      } else {
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>ID</th><th>Creation Date</th><th>Pet</th></tr></thead>";
        echo "<tbody>";
        while ($fila = mysqli_fetch_assoc($query)) {
            $query2=$mysqli->query("SELECT * FROM `pets` WHERE `id`='".$fila['pet']."'");;
            if (!$query2) {
              echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
            } else {
              $result2 = mysqli_fetch_assoc($query2);
            }
          echo "<tr><td>{$fila['id']}</td><td>{$fila['date']}</td><td>{$result2['name']}</td>";
          echo "</tr>";
        }
        echo "</tbody>";
        echo "<tfoot></tfoot>";
        echo "</table>";
      }
    }
}
  
?>