<?php

  require_once("class/auth.php");



  if(auth()->estaLogueado()) {
    session_destroy();

    setcookie("idUser", null, -1);
  }

  header("location:index.php");exit;



?>
