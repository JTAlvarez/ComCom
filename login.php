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
                <form class="" action="index.html" method="post">
                    <input type="email" name="correo" placeholder=" CORREO ELECTRONICO" value="" required> <br>
                    <input type="password" name="pass" placeholder=" CONTRASEÑA" value="" required>
                    <button type="submit" class="register-button" name="registrarse"><p>INICIAR SESIÓN</p></button>
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
