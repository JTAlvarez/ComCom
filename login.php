<?php
  require_once("funciones.php");

  if(estaLogueado()) {
    header("location:index.php");exit;
  }

  $correo = "";

  $errores = [];


  if ($_POST) {
    $errores = validarAcceso($_POST);

    if(empty($errores)) {
      $usuario = buscarPorMail($_POST["correo"]);
      acceder($usuario);

      if(!isset($errores["correo"])){
       $correo = $_POST["correo"];
      }

      if (isset($_POST["recordame"])) {
        setcookie("idUser", $usuario["id"], time() + 86400 * 30);
      }
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Iniciar sesión</title>
    <link rel="icon" type="image/png" sizes "66 x 47" href="img/icono.png">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
</head>

<body>

    <!-- header -->
    <?php include_once "header.php"; ?>
    <br>
    <br>
    <br>
    <div class="box-register">
        <div class="register-container">
            <div class="register-title">
                <h1>INICIAR SESIÓN</h1>
            </div>
            <div class="register-form">
                <a href="#"><span class="fb-button"><img src="img/facebook.png" alt="facebook">&nbsp;&nbsp;INGRESÁ CON TU FACEBOOK</span></a>
                <p>o ingresá con tu usuario</p>
                <form class="" action="login.php" method="post">

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
                    <input type="password" name="pass" placeholder=" CONTRASEÑA" value="" required>
                  </div>

                    <label><input type="checkbox" name="recordame"><span class="terminos">Mantenerme conectado</span></label>
                    <button type="submit" class="register-button" name="registrarse"><p>INICIAR SESIÓN</p></button>
                    <a href="#"><span> ¿Olvidaste tu contraseña? </span></a>

                </form>
            </div>
        </div>
        <div class="register-footer">
            ¿No tenés cuenta? <a href="signup.php"><b>Registrate</b></a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- footer -->
    <?php include_once "footer.php"; ?>
</body>


</html>
