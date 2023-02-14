<?php
function sesion(){
    session_start();
    if (!isset($_SESSION["user_log"])) {
      session_destroy();
      header("location:../index.php");
    }
}
?>