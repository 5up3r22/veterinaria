<?php
include '../BackEnd/validarSesionActiva.php';
include '../BackEnd/llenarHistoria.php';
sesion();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Pets Clinic</title>

  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

  <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
  <div class="d-flex" id="wrapper">
    <div class="border-end bg-white" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom bg-primary fw-bold">Pets Clinic</div>
      <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3 fw-bold display-7" href="../FrontEnd/vistaUsuarios.php"></i>Users</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 fw-bold display-7" href="../FrontEnd/vistaMascotas.php">Pets</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 fw-bold display-7" href="../FrontEnd/vistaReportes.php">Visit records</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 fw-bold display-7" href="../FrontEnd/vistaHistoriaClinica.php">Clinic History</a>
        <br>
        <center>
          <a href="../FrontEnd/dashboard.php" class="list-group-item-light fw-bold display-7 btn btn-outline-warning ms-md-3">Dashboard Main</a>
        </center>
        <br>
        <center>
          <form action="../BackEnd/validarLogout.php" method="post">
            <input type="submit" class="list-group-item-light fw-bold display-7 btn btn-outline-primary ms-md-3" name="logout" value="Log Out">
          </form>
        </center>
        <br>
      </div>
    </div>
    <div id="page-content-wrapper">
      <nav class="navbar navbar-light bg-white  navbar-expand-md ">
        <div class="container" style=" margin-bottom:20px">
          <div class="col-5 pl-md-5 text-left">
            <a href="#" id="sidebarToggle">
              <img src="../images/logo.jpg" height="30" alt="image">
            </a>
          </div>
        </div>
      </nav>
      <!-- Page content-->
      <div class="container-fluid" style="padding:5%;">
      <h2>CLINIC REPORTS</h2>
        <div class="table-responsive">
          <?php
          tablaReportes();
          ?>
        <section class="fa-1x">
          <footer class="pt-4 pb-4" style="margin-top:5%;">
            <div class="container">
              <div class="row text-center">
                <div class="col">
                  <p>© 2023 5up3r. All Rights Reserved</p>
                </div>
              </div>
            </div>
          </footer>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/scripts.js"></script>
  <script>
    function validarFormulario() {
      const temp = document.getElementById('temp').value;
      const weight = document.getElementById('weight').value;
      const heart = document.getElementById('heart').value;
      const comm = document.getElementById('comments').value;
      const pet = document.getElementById('pet').value;
      const vet = document.getElementById('vet').value;
      const alerta = document.getElementById('alerta');
      if (temp === '' || weight=== ''|| heart=== '' || comm=== '' || pet === '-1'|| vet === '-1') {
        alerta.innerHTML = 'Please check the fields and select an option.';
        alerta.style.display = 'block';
        return false;
      } else {
        alerta.style.display = 'none';
        return true;
      }
    }
  </script>
  <script>
    function validarFormulario2() {
      const temp = document.getElementById('temp').value;
      const weight = document.getElementById('weight').value;
      const heart = document.getElementById('heart').value;
      const comm = document.getElementById('comments').value;
      const alerta2 = document.getElementById('alerta2');
      if (temp === '' || weight=== ''|| heart=== '' || comm=== '') {
        alerta2.innerHTML = 'Please check the fields and select an option.';
        alerta2.style.display = 'block';
        return false;
      } else {
        alerta2.style.display = 'none';
        return true;
      }
    }
  </script>
</body>
</html>