<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Pets Clinic</title>
    <meta charset="utf-8">
    <meta name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet"
      href=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css ">
    <link rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  </head>
  <body>
    <section class="pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ">
            <img src="images/vet_login.png" class="img-fluid m-shadow-16 rounded shadow">
          </div>
          <div class="col-md-6">
            <h3 class="display-5 mt-2 fw-bold">Login</h3>
            <br>
            <form class="form" action="BackEnd/validarLogin.php"  method="post">
              <div class="form-group mb-4">
                <input type="number" name="identification" class="form-control" id="identification"
                  placeholder="Identification">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password"></input>
              </div>
              <div class="form-group">
                <button type="submit" value="Send" class="btn btn-primary btn-lg">
                  Sign In</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="fa-1x">
      <footer class="pt-4 pb-4 ">
        <div class="container">
          <div class="row text-center">
            <div class="col">
              <p>© 2023 5up3r. All Rights Reserved</p>
            </div>
          </div>
        </div>
      </footer>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
  </body>
</html>