<?php

require_once "funciones.php";

var_dump($_SESSION["email"]);

//no se porque me esta guardando el array usuario dentro de una posicion llamada email dentro de session
$usuario = traerUsuarioLogueado();

var_dump($usuario);

//deberia completar las variables desde $_SESSION
$errores=[];
$lastNameOk=$usuario["lastName"];
$nameOk=$usuario["name"];
$emailOk=$usuario["email"];
$usuarioExistente="";
$errorLogin=false;
$logout= "logout";
$login="login";

if ($_POST){
  //var_dump($_POST);
  $errores=actualizarRegistro($_POST);

  //var_dump($errores);
}

?>

<!DOCTYPE html>
<html lang="en">
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
    <header class="nav-header"> 
        <input type="checkbox" id="abrir-cerrar" name="abrir-cerrar" value="">
        <label for="abrir-cerrar"><a href="#home" class="btn-home"><i class="fa fa-home"></i></a><span class="abrir">&#9776;</span><span class="cerrar">&#9776; Cerrar</span></label>
        <div id="sidebar" class="sidebar">
            <ul class="menu">
                <li><a href="index.php#section-nosotros">nosotros</a></li>
                <li><a href="index.php#section-estilos">estilos</a></li>
                <li><a href="contact.php">contacto</a></li>
                <li><a href="index.php">home</a></li><!-- 
                <a class="btn-home" href="#home"><i class="fa fa-home btn-home"></i></a> -->
                <?php if (usuariologueado()):?>
                <li><span style="padding: 14.5px 16px; color: #f90; float:left" >Bienvenide, <?= $nameOk?> !</span><a href="logout.php"><?= $logout?>
                  <?php else:?>
                  <li><a href="#section-forms"><?= $login?>
                  <?php endif?></a></li>
            </ul>
        </div>
    </header>
    <main>
      <div class ="container">
      <section id="section-contact">
          <div class="contain-contact">
            <div id="section-forms">
              <div class="formulario">
                
                  <h1 id="section-register">Bienvenide <?= $usuario["name"]?></h1>
                  <h3>Actualizá tus datos</h3>
              <form action="#section-register" method="POST" class="tarjets">
                <?php /* if (existeElUsuario($_POST["email"])): */?>
                  <!-- <span class="errores"><?= $usuarioExistente ?></span> -->
                <?php /* endif */ ?>
                  <?php if (isset($errores["name"])):?>
                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name">
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
                        <input type="text" class="form-control" id="lastName" name="lastName">
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
                    <h3>Actualizá tu email:</h3>
                  <?php if(isset($errores["email"])):?>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                      <span class="errores"><?= $errores["email"] ?></span>
                    </div>
                    <div class="form-group">
                      <label for="email2">Repetí tu email</label>
                      <input type="email" class="form-control" id="email2" name="email2" aria-describedby="emailHelp">
                      <span class="errores"><?= $errores["email"] ?></span>
                    </div>
                  <?php else:?>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= $emailOk?>">
                    </div>
                    <div class="form-group">
                      <label for="email2">Repetí tu email</label>
                      <input type="email" class="form-control" id="email2" name="email2" aria-describedby="emailHelp" value="<?= $emailOk?>">
                    </div>
                  <?php endif?>
                  <h3>Actualizá tu contaseña:</h3>
                  <?php if(isset($errores["pass"])):?>
                    <div class="form-group">
                      <label for="pass">Contraseña actual</label>
                      <input type="password" class="form-control" id="pass" name="pass" maxlength="20" tabindex="17" autocapitalize="none" spellcheck="false" autocorrect="off" autocomplete="off" data-uid="5">
                      <span class="errores"><?= $errores["pass"] ?></span>
                    </div>
                    <div class="form-group">
                      <label for="pass2">Nueva contraseña</label>
                      <input type="password" class="form-control" id="pass2" name="pass2" maxlength="20" tabindex="17" autocapitalize="none" spellcheck="false" autocorrect="off" autocomplete="off" data-uid="5">
                      <span class="errores"><?= $errores["pass"] ?></span>
                    </div>
                    <div class="form-group">
                      <label for="pass3">Repetí la contraseña nueva</label>
                      <input type="password" class="form-control" id="pass3" name="pass3" maxlength="20" tabindex="17" autocapitalize="none" spellcheck="false" autocorrect="off" autocomplete="off" data-uid="5">
                      <span class="errores"><?= $errores["pass"] ?></span>
                    </div>
                  <?php else:?>
                    <div class="form-group">
                      <label for="pass">Contraseña actual</label>
                      <input type="password" class="form-control" id="pass" name="pass" maxlength="20" tabindex="17" autocapitalize="none" spellcheck="false" autocorrect="off" autocomplete="off" data-uid="5">
                    </div>
                    <div class="form-group">
                      <label for="pass2">Nueva contraseña</label>
                      <input type="password" class="form-control" id="pass2" name="pass2" maxlength="20" tabindex="17" autocapitalize="none" spellcheck="false" autocorrect="off" autocomplete="off" data-uid="5">
                    </div>
                    <div class="form-group">
                      <label for="pass3">Repetí la contraseña nueva</label>
                      <input type="password" class="form-control" id="pass3" name="pass3" maxlength="20" tabindex="17" autocapitalize="none" spellcheck="false" autocorrect="off" autocomplete="off" data-uid="5">
                    </div>
                  <?php endif?>
                    <button type="submit" name="register" value="register" class="btn-standard">Actualizar</button>
                  </form>
              </div>
            </div>
          </div>
        </section>
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
  </div>
</body>
</html>