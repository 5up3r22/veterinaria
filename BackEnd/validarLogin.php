<?php
session_start();
$host = 'containers-us-west-36.railway.app';
$port = '7635';
$dbname = 'railway';
$username = 'root';
$password = 'YZv9j9VAjnUf4jAOpYvo';
$mysqli = new mysqli($host, $username, $password, $dbname, $port);

if ($mysqli->connect_errno) {
  echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
    $identification = $_POST["identification"];
    $password = $_POST["password"];
    $query = $mysqli->query("SELECT * FROM `users` WHERE `identification`='$identification' AND `password`='$password'");
    if (!$query) {
        echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
      }else{
        if ($query->num_rows == 0) {
          echo'<script type="text/javascript">
          alert("Error de identificación o password");
          window.location.href="../index.php";
          </script>';
          }elseif($query->num_rows == 1) {
            $_SESSION["user_log"] = $query->fetch_assoc();
            header("location:/FrontEnd/dashboard.php");
      }
}
}

?>
