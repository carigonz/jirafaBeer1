<?php

require_once "funciones.php";


$errores=[];
$lastNameOk="";
$nameOk="";
$emailOk="";
$usuarioExistente="";
$errorLogin=false;

var_dump($_POST);
echo "<br>";
if ($_POST) {
  if (!empty($_POST["register"])) {

    $errores = validarRegistro($_POST);
    var_dump($errores);
    $nameOk = trim($_POST["name"]);
    $lastNameOk = trim($_POST["lastName"]);
    $emailOk = trim($_POST["email"]);

    if (empty($errores)){
      if(!existeElUsuario($_POST["email"])){

        $usuario=armarUsuario($_POST);
        $guardarUsuario=guardarUsuario($usuario);
        // var_dump($guardarUsuario);
        //exit;
      }else{
        $usuarioExistente = "El usuario ya se encuentra registrado.";
      }
    }
  }
  if (!empty($_POST['login'])) {

    $errores = validarLogin($_POST);
    var_dump($errores);

    if (empty($errores)){
      $usuario= buscarUsuario($_POST["email"]);

      //var_dump($usuario);
      //exit;

      /* if ($usuario == "La contraseña es incorrecta."){
        $errorLogin= $usuario; */

      if ($usuario==null){
        $errorLogin = "El mail no se encuentra registrado. Por favor, regístrese haciendo <a href='#section-register'>click acá</a>.";
      }

      //redirijo
      header ("Location:exito.php");
      exit;

      //session va en otra pagina??

      //session_start();
      //$_SESSION["name"]=$usuario["name"];
      //$_SESSION["email"]=$usuario["email"];
      //$_SESSION["gender"]=$usuario["gender"];
      //$_SESSION["lastName"]=$usuario["lastName"];

      //header("Location:exito.php");



    }

  }

}
?>


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
</head>
<body>
    <!-- <header class="nav-header">
        <input type="checkbox" id="abrir-cerrar" name="abrir-cerrar" value="">
        <label for="abrir-cerrar"><a href="#home" class="btn-home"><i class="fa fa-home"></i></a><span class="abrir">&#9776;</span><span class="cerrar">&#9776; Cerrar</span></label>
        <div id="sidebar" class="sidebar">
            <ul class="menu">
                <li><a href="#section-nosotros">nosotros</a></li>
                <li><a href="#section-estilos">estilos</a></li>
                <li><a href="#section-contact">contacto</a></li>
                <li><a href="#section-forms">login</a></li>
                <li><a class="btn-home" href="#home"><i class="fa fa-home btn-home"></i></a></li>
            </ul>
        </div>
    </header> -->
    <main>
      <div id="contenido">
        <section class="landing" id="home">
            <div class="bloque-home">
                 <!-- <video class="background-video" poster="http://adnhd.com/wp-content/uploads/2018/10/0029462316.jpg" src="IMG/Loop-Background.mp4" autoplay loop muted></video> -->
                <div class="logo-landing">
                    <img class="logo-landing-img" src="IMG\girafa-beer-logo.png" alt="girafa-logo">
                    <h2 class="title-princ">jirafa BrewHouse</h2>
                </div>
            </div>
        </section>
        <section id="section-nosotros">
            <div class="nosotros">
                <p class="paragraph-us"><h1 class="title-princ">Nosotros</h1>¡Hablemos de cervezas! Somos una cervecería que hace <em>cerveza de garage</em>, ¿Qué significa esto? Somos un emprendimiento de dos amigos que les gusta el mundo de la cerveza, tenemos nuestra fábrica en nuestro garage.. y muchas ganas de aprender. Las recetas de todas nuestras birras se encuentran en linea. ¿Estas comenzando y tenes dudas? <a style="color:#ffbb37" href="#section-contact">No dudes en contactarnos</a></p>
                <!-- <p class="dektop-us">Una vez al mes hacemos una visita guiada por la fábrica acompañada de una pequeña cocción de unos 20 litros, allí compartimos nuestros conocimientos, aprendemos de ustedes, y les contamos nuestra experiencia.</p> -->

              </div>
        </section>
        <section id="section-estilos">
          <div class="container-styles">
            <h1 class="title-princ">estilos</h1>
              <div style="background-image:url(IMG/rubia2.jpg)" class="card">
                  <h1>Rubia</h1>
                  <p class="title">IPA's o Blonde, muy suaves o muy power.</p>
                </div>
                <div style="background-image:url(IMG/negra2.jpg)" class="card">
                  <h1>Negra</h1>
                  <p class="title">Stout, porter, mucho aroma y sabor.</p>
                </div>
                <div style="background-image:url(IMG/roja2.jpg)" class="card">
                  <h1>Roja</h1>
                  <p class="title">Cervezas maltosas, agradables al paladar</p>
                </div>
                    <!-- cards desktop -->
                <div style="background-image:url(IMG/rubia.jpg);alt:cerveza rubia" class="card-desktop">
                  <h1>Rubia</h1>
                  <p class="title">IPA's o Blonde, muy suaves o muy power.</p>
                </div>
                <div style="background-image:url(IMG/negra.jpg)" class="card-desktop">
                  <h1>Negra</h1>
                  <p class="title">Stout, porter, mucho aroma y sabor.</p>
                </div>
                <div style="background-image:url(IMG/roja.jpg)" class="card-desktop">
                  <h1>Roja</h1>
                  <p class="title">Cervezas maltosas, agradables al paladar</p>
                </div>
          </div>
        </section>
        <section id="section-contact">
          <div class="contain-contact">
            <div class="contacto formulario">
              <h1>¿JirafaBeer en tu evento? Contactanos</h1>
              <form action="#" method="get" class="tarjets">
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
            <div id="section-forms">
              <div class="formulario">
                <h1>LOGIN</h1>
                <form action="#section-forms" method="post" class="tarjets ">
                  <div class="form-group">
                  <?php if(isset($errorLogin)):?>
                    <span class="errores"><?= $errorLogin ?></span>
                  <?php endif?>

                    <label for="email">Email</label>
                  <?php if(isset($errores["email"]) && (!empty($_POST["login"]))):?>
                    <input type="email" class="form-control" id="email" style="background-color:rgba(255,0,0,0.2); border-radius:10px" name="email" aria-describedby="emailHelp">
                    <span class="errores"><?= $errores["email"] ?></span>
                  <?php else:?>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                  <?php endif ?>
                  </div>
                  <div class="form-group">
                    <label for="pass">Password</label>
                  <?php if(isset($errores["pass"]) && (!empty($_POST["login"]))):?>
                    <input type="password" class="form-control" id="pass" style="background-color:rgba(255,0,0,0.2); border-radius:10px" name="pass" aria-describedby="forgotPass">
                    <span class="errores"><?= $errores["pass"] ?></span>
                    <p><a class="forgot-pass" href="">Olvidé mi contraseña</a></p>
                  <?php else :?>
                  <input type="password" class="form-control" id="pass" name="pass" aria-describedby="forgotPass">
                    <p><a class="forgot-pass" href="">Olvidé mi contraseña</a></p>
                  <?php endif ?>
                  </div>
                  <button type="submit" class="btn-standard" value="login" name="login">Ingresar</button>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Recordarme</label>
                  </div>
                </form>
                  <h1 id="section-register">REGISTRATE</h1>
                  <h3>¿No tenes cuenta? Completá tus datos</h3>
              <form action="#section-register" method="POST" class="tarjets">
                <?php if (isset($_POST["email"]) && existeElUsuario($_POST["email"])):?>
                  <span class="errores"><?= $usuarioExistente ?></span>
                <?php endif ?>
                  <?php if (isset($errores["name"])):?>
                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" style="background-color:rgba(255,0,0,0.2); border-radius:10px">
                      <span class="errores"><?= $errores["name"] ?></span>
                    </div>
                  <?php else :?>
                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?= $nameOk?>">
                    </div>
                  <?php endif ?>
                  <?php if (isset($errores["lastName"])):?>
                    <div class="form-group">
                        <label for="lastName">Apellido</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" style="background-color:rgba(255,0,0,0.2); border-radius:10px">
                        <span class="errores"><?= $errores["lastName"] ?></span>
                    </div>
                  <?php else: ?>
                    <div class="form-group">
                        <label for="lastName">Apellido</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?=$lastNameOk?>">
                    </div>
                  <?php endif ?>
                    <div class="form-group">
                    <label for="gender">Género:</label><br>
                    <?php if(isset($errores["gender"]) && $errores["gender"]=="fem"):?>
                      <input type="radio" name="gender" value="fem" checked>Femenino
                    <?php else:?>
                      <input type="radio" name="gender" value="fem">Femenino
                    <?php endif?>
                    <?php if (isset($_POST["gender"]) && $_POST["gender"] == "masc"): ?>
                      <input type="radio" name="gender" value="masc" checked>Masculino
                    <?php else:?>
                      <input type="radio" name="gender" value="masc">Masculino
                    <?php endif?>
                    <?php if (isset($_POST["gender"]) && $_POST["gender"] == "other"): ?>
                      <input type="radio" name="gender" value="other" ckecked>Prefiero no decirlo
                    <?php else:?>
                      <input type="radio" name="gender" value="other">Prefiero no decirlo
                    <?php endif?>
                    <?php if(isset($errores["gender"])):?>
                      <span class="errores"><?= $errores["gender"] ?></span>
                  <?php endif?>
                    </div>

                  <?php if(isset($errores["email"]) && (!empty($_POST["register"]))):?>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" style="background-color:rgba(255,0,0,0.2); border-radius:10px">
                      <span class="errores"><?= $errores["email"] ?></span>
                    </div>
                  <?php else:?>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= $emailOk?>">
                    </div>
                  <?php endif?>
                  <?php if(isset($errores["pass"]) && (!empty($_POST["register"]))):?>
                    <div class="form-group">
                      <label for="pass">Contraseña</label>
                      <input type="password" class="form-control" id="pass" name="pass" maxlength="20" style="background-color:rgba(255,0,0,0.2); border-radius:10px" tabindex="17" autocapitalize="none" spellcheck="false" autocorrect="off" autocomplete="off" data-uid="5">
                      <span class="errores"><?= $errores["pass"] ?></span>
                    </div>
                    <div class="form-group">
                      <label for="pass2">Repetí la contraseña</label>
                      <input type="password" class="form-control" id="pass2" name="pass2" maxlength="20" style="background-color:rgba(255,0,0,0.2); border-radius:10px" tabindex="17" autocapitalize="none" spellcheck="false" autocorrect="off" autocomplete="off" data-uid="5">
                      <span class="errores"><?= $errores["pass"] ?></span>
                    </div>
                  <?php else:?>
                    <div class="form-group">
                      <label for="pass">Contraseña</label>
                      <input type="password" class="form-control" id="pass" name="pass" maxlength="20" tabindex="17" autocapitalize="none" spellcheck="false" autocorrect="off" autocomplete="off" data-uid="5">
                    </div>
                    <div class="form-group">
                      <label for="pass2">Repetí la contraseña</label>
                      <input type="password" class="form-control" id="pass2" name="pass2" maxlength="20" tabindex="17" autocapitalize="none" spellcheck="false" autocorrect="off" autocomplete="off" data-uid="5">
                    </div>
                  <?php endif?>
                    <div class="form-group form-adult">
                    <?php if(isset($errores["adult"])):?>
                        <input type="checkbox" name="adult" class="form-check-adult" id="adult" value="adult">
                      <?php else:?>
                        <input type="checkbox" name="adult" class="form-check-adult" id="adult" value="adult">
                    <?php endif?>
                        <label class="form-check-label" for="adult">Soy mayor de 18 años</label>
                        <p class="term-conditions">Al registrarme, declaro que soy mayor de edad y acepto los Terminos y condiciones y las Políticas de privacidad.</p>
                    <?php if(isset($errores["adult"])):?>
                        <span class="errores"><?= $errores["adult"] ?></span>
                    <?php endif?>
                    </div>
                    <button type="submit" name="register" value="register" class="btn-standard">Registrarme</button>
                  </form>
              </div>
            </div>
          </div>
        </section>
        </div>
      </main>
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
