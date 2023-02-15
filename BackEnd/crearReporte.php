<?php 
$mysqli = new mysqli("mysql://root:YZv9j9VAjnUf4jAOpYvo@containers-us-west-36.railway.app:7635/railway", "root","", "control_vet");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }else{
    $temp= $_POST["temp"];
    $weight=$_POST["weight"];
    $heart=$_POST["heart"];
    $comm=$_POST["comments"];
    $pet=$_POST["pet"];
    $vet=$_POST["vet"];
    $currentDate = date('Y-m-d H:i:s');
     $query= $mysqli->query("SELECT * FROM `clinic_history` WHERE `pet`='$pet'");
        if(!$query){
            echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
        }else{
            $result2=mysqli_fetch_assoc($query);
            $clinic=$result2["id"];
            $query2 =$mysqli->query("INSERT INTO `records`(`id`, `temp`, `weight`, `heart_frec`, `date`, `comments`, `history_id`, `vet_helper`) VALUES (NULL,'$temp','$weight','$heart','$currentDate','$comm','$clinic','$vet')");
      if (!$query2) {
          echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
        }else{
            header("location:../FrontEnd/vistaReportes.php");
        }
    }
  }
?>