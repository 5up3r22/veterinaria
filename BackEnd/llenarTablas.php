<?php

function tablaUsuarios(){
    $mysqli = new mysqli("localhost", "root", "", "control_vet");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }else{
        $query = $mysqli->query("SELECT * FROM `clients`");
        if (!$query) {
            echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
          }else{
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>ID</th><th>Name</th><th>Identification</th><th>Gender</th><th>Actions</th></tr></thead>";
            echo "<tbody>";
            while ($fila = mysqli_fetch_assoc($query)) {
                if ($fila['gender']==0){
                   $genero='Masculino';
                }else if($fila['gender']==1){
                    $genero='Femenino';
                }
                echo "<tr><td>{$fila['id']}</td><td>{$fila['name']}</td><td>{$fila['identification']}</td><td>{$genero}</td><td>";
                echo "<form action='' method='post'>";
                echo "<input type='hidden' name='id' value='{$fila['id']}'>";
                echo "<button type='submit' class='btn btn-primary'>Edit</button>";
                echo "</form>";
                echo "<form action='../BackEnd/eliminarUsuario.php' method='post'>";
                echo "<input type='hidden' name='id' value='{$fila['id']}'>";
                echo "<button type='submit' class='btn btn-danger'>Delete</button>";
                echo "</form>";
                echo "</td></tr>";
            }
            echo "</tbody>";
            echo "<tfoot><tr><td colspan='4'><button type='submit' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal'>Agregar</button></td></tr></tfoot>";
            echo "</table>";
          }
      }
}
?>