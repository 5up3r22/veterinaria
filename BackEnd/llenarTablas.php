<?php
function tablaUsuarios(){
  $mysqli = new mysqli("localhost", "root", "", "control_vet");
  if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  } else {
    $query = $mysqli->query("SELECT * FROM `clients`");
    if (!$query) {
      echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
    } else {
      echo "<table class='table table-striped'>";
      echo "<thead><tr><th>ID</th><th>Name</th><th>Identification</th><th>Gender</th><th>Actions</th></tr></thead>";
      echo "<tbody>";
      while ($fila = mysqli_fetch_assoc($query)) {
        if ($fila['gender'] == 0) {
          $genero = 'Masculino';
        } else if ($fila['gender'] == 1) {
          $genero = 'Femenino';
        }
        echo "<tr><td>{$fila['id']}</td><td>{$fila['name']}</td><td>{$fila['identification']}</td><td>{$genero}</td><td>";
        echo "<button type='button' class='btn btn-primary edit-button' data-bs-toggle='modal' data-bs-target='#modalEditUser' data-id='".$fila['id']."'>Edit</button>";
        echo "<form action='../BackEnd/eliminarUsuario.php' method='post'>";
        echo "<input type='hidden' name='id' value='{$fila['id']}'>";
        echo "<button type='submit' class='btn btn-danger'>Delete</button>";
        echo "</form>";
        echo "</td></tr>";
      }
      echo "</tbody>";
      echo "<tfoot><tr><td colspan='4'><button type='submit' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modalNewUser'>Add New User</button></td></tr></tfoot>";
      echo "</table>";
    }
  }
  //INICIO DE MODAL DE CREAR USUARIO
  echo "<div class='modal fade' id='modalNewUser' tabindex='-1' aria-labelledby='Modal User Create' aria-hidden='true'>";
  echo " <div class='modal-dialog'>";
  echo " <div class='modal-content'>";
  echo " <div class='modal-header'>";
  echo " <h5 class='modal-title' id='exampleModalLabel'>Add User</h5>";
  echo " <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
  echo " </div>";
  echo " <div class='modal-body'>";
  echo " <form class='form' action='../BackEnd/crearUsuario.php' method='post' onsubmit='return validarFormulario()'>";
  echo " <div class='alert alert-danger' id='alerta' style='display:none;'></div>";
  echo " <div class='form-group mb-4'>";
  echo " <input type='text' name='name' class='form-control' id='name' placeholder='Client Name'>";
  echo " </div>";
  echo " <div class='form-group mb-4'>";
  echo " <input type='number' name='identification' class='form-control' id='identification' placeholder='Identification'>";
  echo " </div>";
  echo "<div class='form-group mb-4'>";
  echo " <select class='form-control' name='gender' id='gender'>";
  echo " <option value='-1'>Select an Option</option>";
  echo " <option value='0'>Masculino</option>";
  echo " <option value='1'>Femenino</option>";
  echo " </select>";
  echo " </div>";
  echo " <div class='modal-footer'>";
  echo " <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancel</button>";
  echo " <button type='submit' class='btn btn-success'>Add</button>";
  echo " </div>";
  echo " </form>";
  echo " </div>";
  echo " </div>";
  echo " </div>";
  echo " </div>";
  //FINAL DE MODAL DE CREAR USUARIO
  //INICIO MODAL DE EDITAR USUARIO
  echo "<div class='modal fade modalEditUser' id='modalEditUser' tabindex='-1' aria-labelledby='Modal User Edit aria-hidden='true'>";
  echo " <div class='modal-dialog'>";
  echo " <div class='modal-content'>";
  echo " <div class='modal-header'>";
  echo " <h5 class='modal-title' id='exampleModalLabel'>Edit User</h5>";
  echo " <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
  echo " </div>";
  echo " <div class='modal-body'>";
  echo " <form class='form' id='formularioEditar' action='../BackEnd/EditarUsuario.php' method='post' onsubmit='return validarFormulario2()'>";
  echo " <div class='alert alert-danger' id='alerta2' style='display:none;'></div>";
  echo " <input type='hidden' name='id' id='id'>";
  echo " <div class='form-group mb-4'>";
  echo " <input type='text' name='name2' class='form-control' id='name2' placeholder='Name'>";
  echo " </div>";
  echo " <div class='form-group mb-4'>";
  echo " <input type='number' name='identification2' class='form-control' id='identification2' placeholder='Identification'>";
  echo " </div>";
  echo "<div class='form-group mb-4'>";
  echo " <select class='form-control' name='gender2' id='gender2'>";
  echo " <option value='-1'>Select an Option</option>";
  echo " <option value='0'>Masculino</option>";
  echo " <option value='1'>Femenino</option>";
  echo " </select>";
  echo " </div>";
  echo " <div class='modal-footer'>";
  echo " <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancel</button>";
  echo " <button type='submit' class='btn btn-success'>Save</button>";
  echo " </div>";
  echo " </form>";
  echo " </div>";
  echo " </div>";
  echo " </div>";
  echo " </div>";
  echo "</div>";
  echo "</div>";
  //FINAL MODAL DE EDITAR USUARIO
  //SCRIPT EN JS PARA TRAER EL ID DEL REGISTRO MEDIANTE EL BOTON EDITAR HACIA EL MODAL
  echo "<script> 
  const editButtons = document.querySelectorAll('.edit-button');
  const modal = document.getElementById('modalEditUser');
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


















function tablaMascotas(){
  $mysqli = new mysqli("localhost", "root", "", "control_vet");
  if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  } else {
    $query = $mysqli->query("SELECT * FROM `pets`");
    if (!$query) {
      echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
    } else {
      echo "<table class='table table-striped'>";
      echo "<thead><tr><th>ID</th><th>Name</th><th>Pet Breed</th><th>Gender</th><th>Owner</th><th>Actions</th></tr></thead>";
      echo "<tbody>";
      while ($fila = mysqli_fetch_assoc($query)) {
        if ($fila['gender'] == 0) {
          $genero = 'Masculino';
        } else if ($fila['gender'] == 1) {
          $genero = 'Femenino';
        }
        $query2=$mysqli->query("SELECT * FROM `clients` WHERE `id`='".$fila['owner']."'");;
        if (!$query2) {
          echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
        } else {
          $result2 = mysqli_fetch_assoc($query2);
        }
        echo "<tr><td>{$fila['id']}</td><td>{$fila['name']}</td><td>{$fila['race']}</td><td>{$genero}</td><td>{$result2['name']}</td><td>";
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
  //INICIO DE MODAL DE CREAR MASCOTA
  echo "<div class='modal fade' id='modalNewPet' tabindex='-1' aria-labelledby='Modal Pet Create' aria-hidden='true'>";
  echo " <div class='modal-dialog'>";
  echo " <div class='modal-content'>";
  echo " <div class='modal-header'>";
  echo " <h5 class='modal-title' id='exampleModalLabel'>Add Pet</h5>";
  echo " <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
  echo " </div>";
  echo " <div class='modal-body'>";
  echo " <form class='form' action='../BackEnd/crearMascota.php' method='post' onsubmit='return validarFormularioMascota()'>";
  echo " <div class='alert alert-danger' id='alerta' style='display:none;'></div>";
  echo " <div class='form-group mb-4'>";
  echo " <input type='text' name='name' class='form-control' id='name' placeholder='Pet Name'>";
  echo " </div>";
  echo " <div class='form-group mb-4'>";
  echo " <input type='text' name='petBreed' class='form-control' id='petBreed' placeholder='Pet Breed'>";
  echo " </div>";
  echo "<div class='form-group mb-4'>";
  echo " <select class='form-control' name='gender' id='gender'>";
  echo " <option value='-1'>Select an Option</option>";
  echo " <option value='0'>Masculino</option>";
  echo " <option value='1'>Femenino</option>";
  echo " </select>";
  echo " </div>";
  echo "<div class='form-group mb-4'>";
  echo "<select class='form-control' name='owner' id='owner'>";
  echo "<option value='-1'>Select an Owner</option>";
  $ownerMascotas = $mysqli->query("SELECT * FROM `clients`");
  while ($owner = $ownerMascotas->fetch_assoc()) {
    echo "<option value='". $owner['id'] ."'>" . $owner['name'] . "</option>";
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
  //FINAL DE MODAL DE CREAR MASCOTA

  //INICIO DE MODAL DE EDITAR MASCOTA
  echo "<div class='modal fade' id='modalEditPet' tabindex='-1' aria-labelledby='Modal Pet Edit' aria-hidden='true'>";
  echo " <div class='modal-dialog'>";
  echo " <div class='modal-content'>";
  echo " <div class='modal-header'>";
  echo " <h5 class='modal-title' id='exampleModalLabel'>Edit Pet</h5>";
  echo " <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
  echo " </div>";
  echo " <div class='modal-body'>";
  echo " <form class='form' id='formularioEditar' action='../BackEnd/editarMascota.php' method='post' onsubmit='return validarFormularioMascota2()'>";
  echo " <div class='alert alert-danger' id='alerta2' style='display:none;'></div>";
  echo " <div class='form-group mb-4'>";
  echo " <input type='text' name='newName' class='form-control' id='newName' placeholder='Pet Name'>";
  echo " </div>";
  echo " <div class='form-group mb-4'>";
  echo " <input type='text' name='newPetBreed' class='form-control' id='newPetBreed' placeholder='Pet Breed'>";
  echo " </div>";
  echo "<div class='form-group mb-4'>";
  echo " <select class='form-control' name='newGender' id='newGender'>";
  echo " <option value='-1'>Select an Option</option>";
  echo " <option value='0'>Masculino</option>";
  echo " <option value='1'>Femenino</option>";
  echo " </select>";
  echo " </div>";
  echo "<div class='form-group mb-4'>";
  echo "<select class='form-control' name='newOwner' id='newOwner'>";
  echo "<option value='-1'>Select an Owner</option>";
  $ownerMascotas = $mysqli->query("SELECT * FROM `clients`");
  while ($owner = $ownerMascotas->fetch_assoc()) {
    echo "<option value='".$owner['id']."'>".$owner['name']."</option>";
  }
  echo "</select>";
  echo "</div>";
  echo " <div class='modal-footer'>";
  echo " <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancel</button>";
  echo " <button type='submit' class='btn btn-success'>Save</button>";
  echo " </div>";
  echo " </form>";
  echo " </div>";
  echo " </div>";
  echo " </div>";
  echo " </div>";
  //FINAL DE MODAL DE EDITAR MASCOTA
  
//SCRIPT EN JS PARA TRAER EL ID DEL REGISTRO MEDIANTE EL BOTON EDITAR HACIA EL MODAL

  echo "<script> 
  const editButtons = document.querySelectorAll('.edit-button');
  const modal = document.getElementById('modalEditPet');
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