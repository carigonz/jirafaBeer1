<?php


require_once "classes/validator.php";
require_once "ini.php";

$nameOk="";
$lastNameOk="";

$redBackground = "background-color:rgba(255,0,0,0.2); border-radius:10px";

var_dump($_POST);echo "<br>";
var_dump($_FILES);exit;
//echo "<br>";

if ($_POST){

  $errores=Validator::validarProducto($_POST);

  //var_dump($errores);exit;
}
















?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="styles.css" />
    <title>Document</title>
  </head>
  <body>
    <main>
      <div class="container">

        <div class="formulario">
          <h1 id="section-register">Formulario de carga de productos</h1>
          <h3>Por favor complete los datos para la carga del nuevo producto</h3>
          <form action="#section-register" method="POST" class="tarjets">
            <?php if (isset($_POST["email"]) && $dbMysql->existeElUsuario($_POST["email"])):?>
            <span class="errores"><?= $usuarioExistente ?></span>
            <?php endif ?>

            <div class="form-group">
              <label for="name">Nombre del producto</label>
              <input type="text" class="form-control" id="name" name="name"
              value="<?= isset($errores["name"]) ? "" : $nameOk ?>" style="<?= (isset($errores["name"])) ? $redBackground : "" ?>">
              <span class="errores" ><?= isset($errores["name"]) ? $errores["name"] : "" ?></span>
            </div>

            <div class="form-group">
              <label for="description">Descripción (este campo se mostrará en las vistas del producto)</label>
              <input type="text" class="form-control description-product" id="description"
              name="description" value="<?= isset($errores["description"]) ? "" : $lastNameOk ?>"
              style="<?= isset($errores["description"]) ? $redBackground : "" ?>">
              <span class="errores"><?= isset($errores["description"]) ? $errores["description"] : "" ?></span>
            </div>

           <div class="form-group">
             <label for="style">Estilo de cerveza </label>
             <select name="style" id="style" >
               <option selected >elija un estilo</option>
               <optgroup label="Cervezas Ales">
                 <option value="rubia">Rubia</option>
                 <option value="negra">Negra</option>
                 <option value="roja">Roja</option>
               </optgroup>
             </select>
             <span class="errores"><?= isset($errores["style"]) ? $errores["style"] : "" ?></span>
           </div>

           <div class="form-group">
             <label for="presentation">Presentación (volumen) </label>
             <select name="presentation" id="presentation">
               <option value="">elija una presentación</option>
               <optgroup label="cervezas">
                 <option value="bar50">Barril 50lts.</option>
                 <option value="litro">Botella de litro</option>
                 <option value="lata">Lata 473cc.</option>
               </optgroup>
             </select>
             <span class="errores"><?= isset($errores["presentation"]) ? $errores["presentation"] : "" ?></span>
           </div>


           <div class="form-group">
             <label for="stock">Stock disponible para cargar </label>
             <input type="number" name="stock" class="form-control num-stock" id="stock">
             <span class="errores"><?= isset($errores["stock"]) ? $errores["stock"] : "" ?></span>
           </div>

           <div class="form-group">
             <label for="price">Precio por unidad </label>
             <input type="number" name="price" class="form-control num-stock" id="price">
             <span class="errores"><?= isset($errores["price"]) ? $errores["price"] : "" ?></span>
           </div>

           <div class="form-group">
             <label for="merchand">¿El producto corresponde a la categoría merchandising?</label><br>
             <input type="radio" name="merchand" value="true" id="merchand">Si
             <input type="radio" name="merchand" value="false" id="merchand">No
             <span class="errores"><?= isset($errores["merchand"]) ? $errores["merchand"] : "" ?></span>
           </div>

           <div class="form-group">
             <label for="size">Talle / Medida </label>
             <select name="size" id="size">
               <option value="">elija una opción</option>
               <optgroup label="remeras">
                 <option value="s">S</option>
                 <option value="m">M</option>
                 <option value="l">L</option>
                 <option value="xl">XL</option>
               </optgroup>
               <optgroup label="misc">
                <option value="uniq">único</option>
                <option value="NULL">No corresponde</option>
                <option value=""></option>
                <option value=""></option>
               
               </optgroup>
             </select>
             <span class="errores"><?= isset($errores["size"]) ? $errores["size"] : "" ?></span>
           </div>
           <div class="form-group">
             <label for="avatar">Inserte imagen (se verá en la descripción) </label>
             <input type="file" name="avatar" id="avatar">
             <span class="errores"><?= isset($errores["avatar"]) ? $errores["avatar"] : "" ?></span>
           </div>
            <button type="submit" name="register" value="register" class="btn-standard">Cargar</button>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
