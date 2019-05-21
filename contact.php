<?php
//ESTOY TRABAJANDO EN EL FORMULARIO DE CONTACTO PARA LA PROXIMA ENTREGA, Sprint Optional 3 de Mayo
?>

<!--CODIGO DE HEAD-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>jirafa BrewHouse</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="IMG/iconbeer.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header class="nav-header">
        <input type="checkbox" id="abrir-cerrar" name="abrir-cerrar" value="">
        <label for="abrir-cerrar"><a href="#home" class="btn-home"><i class="fa fa-home"></i></a><span class="abrir">&#9776;</span><span class="cerrar">&#9776; Cerrar</span></label>
        <div id="sidebar" class="sidebar">
            <ul class="menu">
                <li><a href="index.php #section-nosotros">nosotros</a></li>
                <li><a href="index.php #section-estilos">estilos</a></li>
                <li><a href="index.php #section-contact">contacto</a></li>
                <li><a href="index.php #section-forms">login</a></li>
                <li><a class="btn-home" href="index.php"><i class="fa fa-home btn-home"></i></a></li>
            </ul>
        </div>
    </header>

    <main>
        <section id="section-contact">
          <div class="contain-contact">
            <div class="contacto formulario">
              <form action="#" method="get" class="tarjets">
                <div class="form-group">
                  <h3>Contactarnos</h3>
                  <p>Envíenos su consulta y le responderemos lo antes posible.</p>

                <div class="form-group">
                  <label for="name">Nombre:</label>
                  <input class="form-control" type="text" id="name" />
                </div>

                <div class="form-group">
                  <label for="mail">E-mail:</label>
                  <input class="form-control" type="email" id="mail" />
                </div>

                <div class="form-group">
                  <label for="msg">Mensaje:</label>
                  <textarea class="form-control" id="msg"></textarea>
                </div>

                <div class="button">
                  <button class="btn-standard" type="submit">enviar</button>
                </div>
              </form>
            </div>
          </div>
        </section>

    </main>

<!--CODIGO DE FOOTER COPIADO DE INDEX Y PEGADO ACA-->

    <footer class="footer">
      <div class="iconos">
        <a href=""><i class="fab fa-facebook-f"></i></a>
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
      </div>
      <p class="nota">Beber con moderación. Prohibida su venta a menores de 18 años.</p>
      <h5 class="copy-footer">Jirafa BrewHouse ® Todos los derechos reservados</h5>

    </footer>
  </body>
</html>
