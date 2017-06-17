<?php

class Auth {

  public static $auth;

  public static function crearAuth() {
    if (self::$auth == null) {
      self::$auth = new Auth();
    }
    return self::$auth;
  }

  private function __construct() {
      session_start();

      if (isset($_COOKIE["idUser"])) {
        $this->acceder($_COOKIE["idUser"]);
      }
  }

  public function acceder($id) {
    $_SESSION["idUser"] = $id;
  }

  public function estaLogueado() {
   return isset($_SESSION["idUser"]);
  }

  public function usuarioLogueado(RepositorioUsuarios $repo) {
   return $repo->buscarPorId($_SESSION["idUser"]);
  }
}

?>
