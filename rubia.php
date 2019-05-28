<?php
//Vemos que codigo hay que poner aca.

require_once "funciones.php";
require_once "classes/validator.php";
//require_once "classes/usuario.php";
require_once "classes/dbmysql.php";

$dbMysql = new DbMysql;

$errores=[];
$lastNameOk="";
$nameOk="";
$emailOk="";
$usuarioExistente="";
$errorLogin=false;
$logout= "logout";
$login="login";

//var_dump($_POST);
//echo "<br>";
if (usuarioLogueado()){
  $usuario=traerUsuarioLogueado();
  //la funcion traer usuario logueado anda medio mal
  //$usuario = $_SESSION["email"]; //sigo sin saber porque esta el array de usuario adentro de una posicion email dentro de session
  $lastNameOk=$usuario["lastName"];
  $nameOk=$usuario["name"];
  $emailOk=$usuario["email"];
}

if ($_POST) {
  if (!empty($_POST["register"])) {

    $errores = Validator::validarRegistro($_POST);
    //var_dump($errores);
    $nameOk = trim($_POST["name"]);
    $lastNameOk = trim($_POST["lastName"]);
    $emailOk = trim($_POST["email"]);

    if (empty($errores)){

      //var_dump($_POST["email"]);
      //echo "<br>";
      //$quepaso = existeElusuario($_POST["email"]);
      //var_dump($quepaso);


      if(!existeElUsuario($_POST["email"])){

        $usuario= new Usuario($_POST); //armarUsuario($_POST);
        //var_dump($usuario);
        //exit;

        $guardarUsuario=$dbMysql->guardarUsuario($usuario);
        // var_dump($guardarUsuario);
        //exit;

        //logueo al usuario
        $usuario= buscarUsuario($_POST["email"]);
        loguearUsuario($_POST["email"]);
        //var_dump($usuario);
        //redirijo
        header("Location:exito.php");
        exit;
        }else{
          $usuarioExistente = "El usuario ya se encuentra registrado.";
        }

    }
  }
  if (!empty($_POST['login'])) {

    $errores = Validator::validarLogin($_POST);
    //var_dump($errores);

    if (empty($errores)){
      $usuario= buscarUsuario($_POST["email"]);
      //var_dump($usuario);
      //var_dump($_POST);
      //var_dump($usuario);
      //exit;

      if ($usuario==null){
        $errorLogin = "El mail no se encuentra registrado. Por favor, regístrese haciendo <a href='#section-register'>click acá</a>.";
      }
      //logeo al usuario
      loguearUsuario($usuario["email"]);

      //seteo de cookies

      if (isset($_POST["remember"])){
        setCookies($usuario);
      }

      //redirijo

      header("Location:exito.php");
      exit;
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
    <header class="nav-header">
        <input type="checkbox" id="abrir-cerrar" name="abrir-cerrar" value="">
        <label for="abrir-cerrar"><a href="#home" class="btn-home">Login</a><span class="abrir">&#9776;</span><span class="cerrar">&#9776; Cerrar</span></label>
        <div id="sidebar" class="sidebar">
            <ul class="menu">
                <li><a href="index.php#section-nosotros">nosotros</a></li>
                <li><a href="index.php#section-estilos">estilos</a></li>
                <li><a href="contact.php">contacto</a></li>
                <li><a href="index.php">home</a></li>
              <?php if (usuarioLogueado()):?>
                <li><a href="logout.php"><?= $logout?></a>
                <span class="welcome" style="padding: 14.5px 16px; float: right; color: #f90" >Bienvenide, <?= $nameOk?> !</span></li>
              <?php else:?>
                  <li><a href="#section-forms"><?= $login?></a></li>
              <?php endif?>
            </ul>
        </div>
    </header>

    <main>
      <div id="contenido">
        <section class="landing" id="home">
            <div class="bloque-home">
                <img class="background-image" src="IMG/madera-rustica.jpg">
                <div class="landing">
                    <img class="landing-img" src="IMG\rubia-landing.png" alt="cerveza-rubia-landing">
                </div>
            </div>
        </section>

        <!-- SECTION CON PRODUCTOS, BRANCH ISSUE-7 VA ACA -->
        <section class="productos">
          <h1>RUBIA</h1>
          <p>Nota: Todo los productos de cerveza rubia van aca. Estoy trabajando en este para un futuro commit.</p>
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
