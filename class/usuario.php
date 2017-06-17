<?php

class Usuario {
  private $nombre;
  private $apellido;
  private $correo;
  private $pass;
  private $id;

  public function __construct($nombre, $apellido, $correo, $password, $id) {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->correo = $correo;
    $this->pass = $password;
    $this->id = $id;
  }

  public static function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public static function crearDesdeArray(Array $datos) {
    if (!isset($datos["id"])) {
      $datos["id"] = NULL;
    }
    return new Usuario(
      $datos["nombre"],
      $datos["apellido"],
      $datos["correo"],
      $datos["pass"],
      $datos["id"]
    );
  }

  public static function crearDesdeArrays(Array $usuarios) {
    $usuariosFinal = [];

    foreach ($usuarios as $usuario) {
      $usuariosFinal[] = self::crearDesdeArray($usuario);
    }

    return $usuariosFinal;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setApellido($apellido) {
    $this->apellido = $apellido;
  }

  public function getApellido() {
    return $this->apellido;
  }

  public function setCorreo($mail) {
    $this->correo = $mail;
  }

  public function getCorreo() {
    return $this->correo;
  }

  public function setPass($pass) {
    $this->pass = $pass;
  }

  public function getPass() {
    return $this->pass;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function guardar(RepositorioUsuarios $repo) {
    $repo->guardarUsuario($this);
  }

  // public function borrar(RepositorioUsuarios $repo) {
  //   $repo->borrarUsuario($this);
  // }

  public function toArray() {
    return [
      "id" => $this->getId(),
      "nombre" => $this->getNombre(),
      "apellido" => $this->getApellido(),
      "correo" => $this->getCorreo(),
      "pass" => $this->getPass()
    ];
  }

}

 ?>
