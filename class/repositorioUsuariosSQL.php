<?php

require_once("repositorioUsuarios.php");
require_once("usuario.php");

class RepositorioUsuariosSQL extends RepositorioUsuarios {
  protected $conexion;

  public function __construct($conexion) {
    $this->conexion = $conexion;
  }

  public function guardarUsuario(Usuario $usuario) {
   if ($usuario->getId() == NULL) {
      $sql = "INSERT INTO usuario values(default, :nombre, :apellido, :correo, :pass)";
      $stmt = $this->conexion->prepare($sql);
   }
   else {
      $sql = "UPDATE usuario set nombre = :nombre, apellido = :apellido, correo = :correo, pass = :pass WHERE id = :id";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
   }

   $stmt->bindValue(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
   $stmt->bindValue(":apellido", $usuario->getApellido(), PDO::PARAM_STR);
   $stmt->bindValue(":correo", $usuario->getCorreo(), PDO::PARAM_STR);
   $stmt->bindValue(":pass", $usuario->getPass(), PDO::PARAM_STR);

   $stmt->execute();
 }

 function traerTodos() {
    $sql = "Select * from usuario";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute();

    return Usuario::crearDesdeArrays($stmt->fetchAll(PDO::FETCH_ASSOC));
  }

  function buscarPorMail($mail) {
    $sql = "Select * from usuario where correo = :correo";
    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":correo", $mail, PDO::PARAM_STR);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result != false) {
        return Usuario::crearDesdeArray($result);
    }
    else {
      return NULL;
    }
  }

  function buscarPorId($id) {
    $sql = "Select * from usuario where id = :id";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result != false) {
        return Usuario::crearDesdeArray($result);
    }
    else {
      return NULL;
    }
  }

  public function borrarUsuario(Usuario $usuario) {
    $sql = "DELETE FROM usuario where id = :id";
    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);

    $stmt->execute();
  }
}

?>
