<?php
  require_once("funciones.php");

  if(estaLogueado()) {
      $usuario = buscarPorId($_SESSION["idUser"]);
  }

?>

<header>
    <div class="header-container">
        <div class="">
            <h1>COMCOM</h1>
        </div>

        <div class="search-container">
            <input class="searchbar" type="text" name="searchbar" placeholder="&nbsp;&nbsp;Que estas buscando?">

        </div>

      <?php  if(!estaLogueado()) { ?>

        <div class="login-button">
            <a href="login.php">Ingresar</a>
        </div>

        <div class="signup-button">
            <a href="signup.php">Registrarse</a>
        </div>

        <?php } else {   ?>

          <div class="perfil-button">
            <a href="perfilDeUsuario.php?id=<?=$usuario["id"]?>">
          <?= $usuario["nombre"] ?>
        </a>
    </div>


    <div class="logout-button">
        <a href="logout.php">Salir</a>
    </div>

<?php } ?>

        <!-- header menu	 -->
        <input class="nav-open" type="checkbox" id="header-event">

        <label class="nav-open" for="header-event">
                <i class="ion-navicon-round"></i>
            </label>

        <nav class="nav-header">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="FAQs.php">Preguntas</a></li>
            </ul>
        </nav>
    </div>

</header>
