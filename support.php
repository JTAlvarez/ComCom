<?php
  require_once("class/auth.php");
  require_once("class/repositorioSQL.php");
  require_once("class/repositorioJSON.php");
  require_once("class/validador.php");

  $auth = Auth::crearAuth();
  $validador = new Validador();

  $soporte = "json";

  switch ($soporte) {
    case 'sql':
      $db = new RepositorioSQL();
      break;

    case 'json':
      $db = new RepositorioJSON();
      break;
  }

?>
