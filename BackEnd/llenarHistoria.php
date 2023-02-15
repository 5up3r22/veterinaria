<?php
function tablaHistorias(){
    $mysqli = new mysqli("mysql://root:YZv9j9VAjnUf4jAOpYvo@containers-us-west-36.railway.app:7635/railway", "root", "", "control_vet");
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
  $mysqli = new mysqli("mysql://root:YZv9j9VAjnUf4jAOpYvo@containers-us-west-36.railway.app:7635/railway", "root", "", "control_vet");
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
        echo "<button type='button' class='btn btn-primary edit-button' data-bs-toggle='modal' data-bs-target='#modalEditReport' data-id='".$fila['id']."'>Edit</button>";
        echo "<form action='../BackEnd/eliminarReporte.php' method='post'>";
        echo "<input type='hidden' name='id' value='{$fila['id']}'>";
        echo "<button type='submit' class='btn btn-danger'>Delete</button>";
        echo "</form>";
        echo "</td></tr>";
      }
      echo "</tbody>";
      echo "<tfoot><tr><td colspan='4'><button type='submit' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modalNewReport'>Add New Pet</button></td></tr></tfoot>";
      echo "</table>";
    }
}
//INICIO DE MODAL PARA CREAR REPORTE CLINICO
echo "<div class='modal fade' id='modalNewReport' tabindex='-1' aria-labelledby='Modal Report Create' aria-hidden='true'>";
echo " <div class='modal-dialog'>";
echo " <div class='modal-content'>";
echo " <div class='modal-header'>";
echo " <h5 class='modal-title' id='exampleModalLabel'>Clinic Report</h5>";
echo " <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
echo " </div>";
echo " <div class='modal-body'>";
echo " <form class='form' action='../BackEnd/crearReporte.php' method='post' onsubmit='return validarFormulario()'>";
echo " <div class='alert alert-danger' id='alerta' style='display:none;'></div>";
echo " <div class='form-group mb-4'>";
echo " <input type='number' step='0.1' name='temp' class='form-control' id='temp' placeholder='Pet Temperature'>";
echo " </div>";
echo " <div class='form-group mb-4'>";
echo " <input type='number' step='0.1' name='weight' class='form-control' id='weight' placeholder='Pet Weight'>";
echo " </div>";
echo " <div class='form-group mb-4'>";
echo " <input type='number' name='heart' class='form-control' id='heart' placeholder='Pet Heart Frecuency'>";
echo " </div>";
echo " <div class='form-group mb-4'>";
echo " <textarea type='text' name='comments' class='form-control' id='comments' placeholder='Comments'></textarea>";
echo " </div>";
echo "<div class='form-group mb-4'>";
  echo "<select class='form-control' name='pet' id='pet'>";
  echo "<option value='-1'>Select a Pet</option>";
  $query = $mysqli->query("SELECT * FROM `pets`");
  while ($result = $query->fetch_assoc()) {
    echo "<option value='".$result['id']."'>".$result['name']."</option>";
  }
  echo "</select>";
  echo "</div>";
echo "<div class='form-group mb-4'>";
  echo "<select class='form-control' name='vet' id='vet'>";
  echo "<option value='-1'>Select a Vet Helper</option>";
  $query = $mysqli->query("SELECT * FROM `users`");
  while ($result = $query->fetch_assoc()) {
    echo "<option value='". $result['id']."'>".$result['name']."</option>";
  }
  echo "</select>";
  echo "</div>";
echo " <div class='modal-footer'>";
echo " <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancel</button>";
echo " <button type='submit' class='btn btn-success'>Add</button>";
echo " </div>";
echo " </form>";
echo " </div>";
echo " </div>";
echo " </div>";
echo " </div>";
//FINAL DE MODAL PARA CREAR REPORTE CLINICO
//INICIO DE MODAL PARA EDITAR REPORTE CLINICO
echo "<div class='modal fade' id='modalEditReport' tabindex='-1' aria-labelledby='Modal Report Edit' aria-hidden='true'>";
echo " <div class='modal-dialog'>";
echo " <div class='modal-content'>";
echo " <div class='modal-header'>";
echo " <h5 class='modal-title' id='exampleModalLabel'>Clinic Report Edit</h5>";
echo " <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
echo " </div>";
echo " <div class='modal-body'>";
echo " <form class='form'  id='formularioEditar' action='../BackEnd/editarReporte.php' method='post' onsubmit='return validarFormulario2()'>";
echo " <div class='alert alert-danger' id='alerta2' style='display:none;'></div>";
echo " <div class='form-group mb-4'>";
echo " <input type='number' step='0.1' name='temp' class='form-control' id='temp' placeholder='Pet Temperature'>";
echo " </div>";
echo " <div class='form-group mb-4'>";
echo " <input type='number' step='0.1' name='weight' class='form-control' id='weight' placeholder='Pet Weight'>";
echo " </div>";
echo " <div class='form-group mb-4'>";
echo " <input type='number' name='heart' class='form-control' id='heart' placeholder='Pet Heart Frecuency'>";
echo " </div>";
echo " <div class='form-group mb-4'>";
echo " <textarea type='text' name='comments' class='form-control' id='comments' placeholder='Comments'></textarea>";
echo " </div>";
echo " <div class='modal-footer'>";
echo " <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancel</button>";
echo " <button type='submit' class='btn btn-success'>Edit</button>";
echo " </div>";
echo " </form>";
echo " </div>";
echo " </div>";
echo " </div>";
echo " </div>";
//FINAL DE MODAL PARA EDITAR REPORTE CLINICO

//SCRIPT EN JS PARA TRAER EL ID DEL REGISTRO MEDIANTE EL BOTON EDITAR HACIA EL MODAL
echo "<script> 
const editButtons = document.querySelectorAll('.edit-button');
const modal = document.getElementById('modalEditReport');
const form = document.getElementById('formularioEditar');

editButtons.forEach(button => {
  button.addEventListener('click', () => {
    const id = button.getAttribute('data-id');
    // Aquí puedes hacer una petición para obtener la información del registro con el id correspondiente y actualizar los campos del formulario
    modal.style.display = 'block';
    
    // Agrega el id como un input de tipo hidden
    const idInput = document.createElement('input');
    idInput.type = 'hidden';
    idInput.name = 'id';
    idInput.value = id;
    form.appendChild(idInput);
    
    form.querySelector('#id').value = id;
  });
});

form.addEventListener('submit', () => {
    // Elimina el input de tipo hidden después de enviar el formulario
    form.removeChild(document.querySelector('input[name=\"id\"]'));
});
</script>";
}
?>