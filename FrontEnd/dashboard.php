<?php
session_start();
if (!isset($_SESSION["user_log"])) {
  session_destroy();
  echo'<script type="text/javascript">
          alert("Debe primero realizar el login con su identificacion y contraseña");
          </script>';
          header("location:../index.php");
} 
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
        <a class="list-group-item list-group-item-action list-group-item-light p-3 fw-bold display-7" href="#!"></i>Users</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 fw-bold display-7" href="#!">Pets</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 fw-bold display-7" href="#!">Visit records</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 fw-bold display-7" href="#!">Clinic History</a>
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
          <!--navbar/-->
          <div class="collapse navbar-collapse justify-content-end col-md-2 navbar-collapse-1 pr-md-0">
            <ul class="navbar-nav">
              <li class="nav-item">
                <form action="../BackEnd/validarLogout.php" method="post">
                  <input type="submit" class="btn btn-outline-primary ms-md-3" name="logout" value="Log Out">
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Page content-->
      <div class="container-fluid" style="padding:5%;">
        <h2>Bienvenido
          <?php
          echo "" . $_SESSION["user_log"]["name"]?>
        </h2>
        <div class="card-group" style="padding: 10%">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Pets</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Visit Records</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Clinic History</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
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
</body>

</html>