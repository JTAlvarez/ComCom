<?php
session_start();
if (isset($_COOKIE["idUser"])) {
    $_SESSION["idUser"] = $_COOKIE["idUser"];
}

//VALIDA DATOS PARA ACCESO ---------------------------------------------------//
function validarAcceso($datos) {
  $errores = [];

  $correo = trim($datos["correo"]);

    if (strlen($correo) == 0) {
        $errores["correo"] = "Debe ingresar mail";
      } else if (! filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores["correo"] = "Debe ingresar un mail válido";
      } else if (buscarPorMail($correo) == false) {
        $errores["correo"] = "El mail ingresado no existe";
      } else {
        $usuario = buscarPorMail($correo);
        if (password_verify($datos["pass"], $usuario["pass"]) == false) {
          $errores["pass"] = "Contraseña incorrecta";
    }
  }
  return $errores;
}


  //BUSCAR USUARIO POR SU MAIL

function buscarPorMail($correo) {
  $all = traerTodos();
  if(count($all)!=0){
    foreach($all as $usuario){
      if($usuario["correo"] == $correo) {
        return $usuario;
      } else {
        return false;
      }
   }
 }
}

//ACCEDER A LA CUENTA DEL USUARIO --------------------------------------------//
function acceder($usuario) {
  $_SESSION["idUser"] = $usuario["id"];
}


//VALIDA DATOS DE REGISTRO ---------------------------------------------------//
function validarRegistro($datos) {
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
  } elseif(buscarPorMail($correo)) {
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

//CREA UN NUEVO USUARIO ------------------------------------------------------//
function crearUsuario($datos) {
  $usuario = [
    "nombre" => $datos["nombre"],
    "apellido" => $datos["apellido"],
    "correo" => $datos["correo"],
    "pass" => password_hash($datos["pass"], PASSWORD_DEFAULT)
  ];
  $usuario["id"] = traerNuevoId();
  return $usuario;
}

//TRAE UN NUEVO ID PARA CREAR UN NUEVO USUARIO
function traerNuevoId() {
  $usuarios = traerTodos();
  if (count($usuarios) == 0) {
    return 1;
  }
  $elUltimo = array_pop($usuarios);
  $id = $elUltimo["id"];
  return $id + 1;
}

//TRAE TODOS LOS USUARIOS
function traerTodos() {
  $archivo = file_get_contents("usuarios.json");   // Leo el archivo
  $usuariosJSON = explode(PHP_EOL, $archivo); // Lo divido por enters
  array_pop($usuariosJSON); // Quito el enter del final
  $usuariosFinal = [];
  foreach($usuariosJSON as $json) { //DE JSON A ARRAY
    $usuariosFinal[] = json_decode($json, true);
  }
  return $usuariosFinal;
}


//GUARDAR USUARIO ------------------------------------------------------------//
  function guardarUsuario($usuario) {
    $json = json_encode($usuario);
    $json = $json . PHP_EOL;

    file_put_contents("usuarios.json", $json, FILE_APPEND);
  }


  function estaLogueado() {
    return isset($_SESSION["idUser"]);
  }

  function usuarioLogueado() {
    return buscarPorId($_SESSION["idUser"]);
  }


?>
