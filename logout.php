<?php
  session_destroy()

  if(!estaLogueado()) {
    header("location:index.php");exit;
  }

?>
