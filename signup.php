
<?php

require_once "funciones.php";

if(estaLogueado()) {
  header("location:index.php");exit;
}

$nombre = "";
$apellido= "";
$correo = "";

$errores = [];

if($_POST) {
  $errores = validarRegistro($_POST);
  if(count($errores)==0) {
    $usuario = crearUsuario($_POST);
    guardarUsuario($usuario);
    header("Location:index.php");exit;
  }

  if(!isset($errores["nombre"])){
    $nombre = $_POST["nombre"];
  }
  if(!isset($errores["apellido"])){
   $apellido = $_POST["apellido"];
  }
  if(!isset($errores["correo"])){
   $correo = $_POST["correo"];
  }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Registrate</title>
    <link rel="icon" type="image/png" sizes "66 x 47" href="img/icono.png">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
</head>

<body>
  <!-- header -->
  <?php   include_once "header.php";?>

    <br>
    <br>
    <br>
    <div class="box-register">
        <div class="register-container">
            <div class="register-title">
                <h1>CREAR CUENTA</h1>
            </div>
            <div class="register-form">
                <a href="#"><span class="fb-button"><img src="img/facebook.png" alt="facebook">&nbsp;&nbsp;INGRESÁ CON TU FACEBOOK</span></a>
                <p>o completá los siguientes datos</p>
                <form class="" action="signup.php" method="POST">
                  <div class="">
                    <?php if(isset($errores["nombre"])){ ?>
                      <span class="valError"><?=$errores["nombre"]?></span>
                    <?php } ?>
                    <input type="text" class="<?=(isset($errores["nombre"]))?("error"):("")?>" name="nombre" placeholder=" NOMBRE" value="<?=$nombre?>">
                  </div>
                  <div class="">
                    <?php if(isset($errores["apellido"])){ ?>
                      <span class="valError"><?=$errores["apellido"]?></span>
                    <?php } ?>
                    <input type="text" class="<?=(isset($errores["apellido"]))?("error"):("")?>" name="apellido" placeholder=" APELLIDO" value="<?=$apellido?>"> <br>
                  </div>
                  <div class="">
                    <?php if(isset($errores["correo"])){ ?>
                      <span class="valError"><?=$errores["correo"]?></span>
                    <?php } ?>
                    <input type="text" class="<?=(isset($errores["correo"]))?("error"):("")?>" name="correo" placeholder=" CORREO ELECTRONICO" value="<?=$correo?>"> <br>
                  </div>
                  <div class="">
                    <?php if(isset($errores["pass"])){ ?>
                      <span class="valError"><?=$errores["pass"]?></span>
                    <?php } ?>
                    <input type="password" class="<?=(isset($errores["pass"]))?("error"):("")?>" name="pass" placeholder=" CONTRASEÑA" value="">
                  </div>
                  <div class="">
                    <?php if(isset($errores["cpass"])){ ?>
                      <span class="valError"><?=$errores["cpass"]?></span>
                    <?php } ?>
                    <input type="password" class="<?=(isset($errores["cpass"]))?("error"):("")?>" name="cpass" placeholder=" CONFIRMAR CONTRASEÑA" value=""> <br>
                  </div>
                  <div class="">
                    <label><input type="checkbox"><span class="terminos">Acepto <i>términos y condiciones</i> y las <i>políticas de privacidad</i> de Comcom</span></label> <br>
                  </div>
                  <div class="">
                    <button type="submit" class="register-button" name="registrarse"><p>REGISTRARSE</p></button>
                  </div>
                </form>
            </div>
        </div>
        <div class="register-footer">
            ¿Ya tenés cuenta? <a href="login.php"><b>Iniciar sesión</b></a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- footer -->
    <?php include_once "footer.php"; ?>

</body>

</html>
