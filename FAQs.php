<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Preguntas Frecuentes</title>
    <link rel="icon" type="image/png" sizes "66 x 47" href="img/icono.png">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <div class="container-FAQs">

      <!-- header -->
      <?php include_once "header.php"; ?>
      <div class="container-FAQs-2">


        <h1 class="titulo-FAQs">PREGUNTAS FRECUENTES</h1>

        <section class="acordin-body">
            <div class="acordin-title" data-q="1">
                <h2><span class="toggle-question">
                    <span class="ion-android-arrow-forward" pos="1"></span>
    				<span class="ion-android-arrow-down" pos="1"></span>
    			¿Que es ComCom?</a></h2>
            </div>
            <div class="answer" data-a="1">
                <p>Una página web de compras de diversos productos, pero a diferencia de las demás, en ComCom compras en <b>COMUNIDAD</b>! <i class="em em-busts_in_silhouette"></i><br>Es decir, muchas personas compran un mismo producto a la vez y así consigues
                    precios mucho más baratos.</p>
            </div>
        </section>

        <section class="acordin-body">
            <div class="acordin-title" data-q="2">
                <h2><span class="toggle-question">
                    <span class="ion-android-arrow-forward" pos="2"></span>
                    <span class="ion-android-arrow-down" pos="2"></span>
                ¿Como compro?</a></h2>
            </div>
            <div class="answer" data-a="2">
                <p>Simplemente elijes el producto deseado y esto genera una reserva, si llegamos al a cantidad mínima en el tiempo estipulado ¡GENIAL! <i class="em em-sunglasses"></i> el producto se compra y se te envía.</p>
            </div>
        </section>

        <section class="acordin-body">
            <div class="acordin-title" data-q="3">
                <h2><span class="toggle-question">
                    <span class="ion-android-arrow-forward" pos="3"></span>
                    <span class="ion-android-arrow-down" pos="3"></span>
                ¿Como pago el producto?</a></h2>
            </div>
            <div class="answer" data-a="3">
                <p>Con tarjeta de crédito por PayPal. El pago se hace efectivo si el producto llego a la cantidad mínima de compra. Si no llego a esa cantidad no veras ninguna registro en tu resumen mensual.</p>
            </div>
        </section>

        <section class="acordin-body">
            <div class="acordin-title" data-q="4">
                <h2><span class="toggle-question">
                    <span class="ion-android-arrow-forward" pos="4"></span>
                    <span class="ion-android-arrow-down" pos="4"></span>
                ¿Como recibo el pedido?</span></h2>
            </div>
            <div class="answer" data-a="4">
                <p>El producto se envía a través de OCA por ComEnvios. El envió se realiza si el producto elegido, llego a su cantidad mínima de compra.</p>
            </div>
        </section>

        <section class="acordin-body">
            <div class="acordin-title" data-q="5">
                <h2><span class="toggle-question">
                    <span class="ion-android-arrow-forward" pos="5"></span>
                    <span class="ion-android-arrow-down" pos="5"></span>
                ¿Se puede cancelar una reserva?</a></h2>
            </div>
            <div class="answer" data-a="5">
                <p>Si, pero solo antes del tiempo limite de compra. Una vez finalizado este tiempo, si no se llego al minimo de usuarias que lo querian no se compra el producto y no se te envia.</p>
            </div>
        </section>

        <section class="acordin-body">
            <div class="acordin-title" data-q="6">
                <h2><span class="toggle-question">
                    <span class="ion-android-arrow-forward" pos="6"></span>
                    <span class="ion-android-arrow-down" pos="6"></span>
                ¿El producto tiene cambio?</a></h2>
            </div>
            <div class="answer" data-a="6">
                <p>Si! Todos nuestros productos tiene garantia oficial y respaldo del fabricante. <i class="em em-thumbsup"></i></p>
            </div>
        </section>
        </div>
        <br>
        <br>
        <br>

        <!-- footer -->
    		<?php include_once "footer.php"; ?>

    </div>

    <!-- Scrip para las preguntas frecuentes -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        $('.acordin-title').click(function() {
            var identify = $(this).attr("data-q");
            $('.answer[data-a=' + identify + ']').slideToggle();
            $('.ion-android-arrow-forward[pos=' + identify + ']').toggle();
            $('.ion-android-arrow-down[pos=' + identify + ']').toggle();
        })
    </script>

</body>

</html>
