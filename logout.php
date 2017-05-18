<?php

  require_once("funciones.php");

  session_destroy();

  setcookie("idUser", null, -1);

  if(estaLogueado()) {
    header("location:index.php");exit;
  }

?>
