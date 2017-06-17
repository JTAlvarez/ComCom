<?php

class Validador {

  function validarRegistro($datos,RepositorioUsuarios $repo) {
    $errores = [];
    $nombre = trim($datos["nombre"]);
    $apellido = trim($datos["apellido"]);
    $correo = trim($datos["correo"]);
    if(strlen($nombre)==0){
      $errores["nombre"] = "Debe ingresar nombre";
    }
    if(strlen($apellido)==0){
      $errores["apellido"] = "Debe ingresar apellido";
    }
    if(strlen($correo)==0){
      $errores["correo"] = "Debe ingresar mail";
    } elseif(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
      $errores["correo"] = "Debe ingresar un mail válido";
    } elseif($repo->buscarPorMail($correo) != false) {
      $errores["correo"] = "El mail ingresado ya existe";
    }
    if(strlen($datos["pass"])==0){
      $errores["pass"] = "Debe ingresar contraseña";
    }
    if(strlen($datos["cpass"]==0)) {
      $errores["cpass"] = "Debe confirmar contraseña";
    }
    if(strlen($datos["pass"])!=0 && strlen($datos["cpass"])!=0 && ($datos["pass"]!=$datos["cpass"])) {
      $errores["pass"] = "Las contraseñas no coinciden";
      $errores["cpass"] = "Las contraseñas no coinciden";
    }
    return $errores;
  }

  public function validarAcceso($datos, RepositorioUsuarios $repo) {
      $errores = [];

      $correo = trim($datos["correo"]);

        if (strlen($correo) == 0) {
            $errores["correo"] = "Debe ingresar mail";
          } else if (! filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores["correo"] = "Debe ingresar un mail válido";
          } else if ($repo->buscarPorMail($correo) == false) {
            $errores["correo"] = "El mail ingresado no existe";
          } else {
            $usuario = $repo->buscarPorMail($correo);
            if (password_verify($datos["pass"], $usuario->getPass()) == false) {
              $errores["pass"] = "Contraseña incorrecta";
        }
      }
      return $errores;
    }

}

?>
