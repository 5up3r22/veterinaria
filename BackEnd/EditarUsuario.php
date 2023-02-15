<?php
$host = 'containers-us-west-36.railway.app';
$port = '7635';
$dbname = 'railway';
$username = 'root';
$password = 'YZv9j9VAjnUf4jAOpYvo';
$mysqli = new mysqli($host, $username, $password, $dbname, $port);
 if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }else{
    $id=$_POST['id'];
 $newName=$_POST['name2'];
 $newIdentification=$_POST["identification2"];
 $newGender=$_POST['gender2'];
      $query = $mysqli->query("UPDATE `clients` SET `name`='".$newName."',`identification`='".$newIdentification."',`gender`='".$newGender."' WHERE `id`='".$id."'");
      if (!$query) {
          echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
        }else{
            header("location:../FrontEnd/vistaUsuarios.php");
        }
  }
?>