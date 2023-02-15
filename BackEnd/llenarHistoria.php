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

function tablaReportes(){
  $mysqli = new mysqli("localhost", "root", "", "control_vet");
  if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  } else {
    $query = $mysqli->query("SELECT * FROM `records`");
    if (!$query) {
      echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
    } else {
      echo "<table class='table table-striped'>";
      echo "<thead><tr><th>ID</th><th>Temperature</th><th>Weight</th><th>Heart Frecuency</th><th>Creation Date</th><th>Comments</th><th>History Pet</th><th>Vet Helper</th><th>Actions</th></tr></thead>";
      echo "<tbody>";
      while ($fila = mysqli_fetch_assoc($query)){
       $query2=$mysqli->query("SELECT * FROM `clinic_history` WHERE `id`='".$fila['history_id']."'");
        if (!$query2) {
          echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
        } else {
          $result2 = mysqli_fetch_assoc($query2);
          $query3=$mysqli->query("SELECT * FROM `pets` WHERE `id`='".$result2['pet']."'");
          if (!$query3) {
          }else{
            $result3 = mysqli_fetch_assoc($query3);
          }
          $query4=$mysqli->query("SELECT * FROM `users` WHERE `id`='".$fila['vet_helper']."'");
          if (!$query4) {
          }else{
            $result4 = mysqli_fetch_assoc($query4);
          }
        }
        echo "<tr><td>{$fila['id']}</td><td>{$fila['temp']}</td><td>{$fila['weight']}</td><td>{$fila['heart_frec']}</td><td>{$fila['date']}</td><td>{$fila['comments']}</td><td>{$result3['name']}</td><td>{$result4['name']}</td><td>";
        echo "<button type='button' class='btn btn-primary edit-button' data-bs-toggle='modal' data-bs-target='#modalEditPet' data-id='".$fila['id']."'>Edit</button>";
        echo "<form action='../BackEnd/eliminarMascota.php' method='post'>";
        echo "<input type='hidden' name='id' value='{$fila['id']}'>";
        echo "<button type='submit' class='btn btn-danger'>Delete</button>";
        echo "</form>";
        echo "</td></tr>";
      }
      echo "</tbody>";
      echo "<tfoot><tr><td colspan='4'><button type='submit' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modalNewPet'>Add New Pet</button></td></tr></tfoot>";
      echo "</table>";
    }
}
}
?>