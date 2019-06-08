<!DOCTYPE html>
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
              <span class="errores"
                ><?= isset($errores["name"]) ? $errores["name"] : "" ?></span
              >
            </div>

            <div class="form-group description-product">
              <label for="lastName">Descripción (este campo se mostrará en las vistas del producto)</label>
              <input type="text" class="form-control " id="lastName"
              name="lastName" value="<?= isset($errores["lastName"]) ? "" : $lastNameOk ?>"
              style="<?= isset($errores["lastName"]) ? $redBackground : "" ?>">
              <span class="errores"
                ><?= isset($errores["lastName"]) ? $errores["lastName"] : "" ?></span
              >
            </div>

           <div class="form-group">
             <label for="style">Estilo de cerveza </label>
             <select name="style" id="style" >
               <option selected value="0">elija un estilo</option>
               <optgroup label="Cervezas Ales">
                 <option value="rubia">Rubia</option>
                 <option value="negra">Negra</option>
                 <option value="roja">Roja</option>
               </optgroup>
             </select>
           </div>

           <div class="form-group">
             <label for="presentation">Presentación (volumen) </label>
             <select name="presentation" id="">
               <option value="">elija una presentación</option>
               <optgroup label="cervezas">
                 <option value="bar50">Barril 50lts.</option>
                 <option value="litro">Botella de litro</option>
                 <option value="lata">Lata 473cc.</option>
               </optgroup>
             </select>
           </div>


           <div class="form-group num-stock">
             <label for="stock">Stock disponible para cargar </label>
             <input type="number" name="stock" class="form-control" id="stock">
           </div>

           <div class="form-group num-stock">
             <label for="price">Precio por unidad </label>
             <input type="number" name="price" class="form-control" id="stock">
           </div>

           <div class="form-group">
             <label for="price">¿El producto corresponde a la categoría merchandising?</label><br>
             <input type="radio" name="true" id="">Si
             <input type="radio" name="false" id="">No
           </div>

           <div class="form-group">
             <label for="presentation">Talle / Medida </label>
             <select name="presentation" id="">
               <option value="">elija una opción</option>
               <optgroup label="remeras">
                 <option value="s">S</option>
                 <option value="m">M</option>
                 <option value="l">L</option>
                 <option value="xl">XL</option>
               </optgroup>
               <optgroup label="misc">
                <option value="uniq">único</option>
                <option value="nosize">No corresponde</option>
                <option value=""></option>
                <option value=""></option>
               
               </optgroup>
             </select>
           </div>
           <div class="form-group">
             <label for="image">Inserte imagen (se verá en la descripción) </label>
             <input type="file" name="image" id="image">
           </div>
            <button type="submit" name="register" value="register" class="btn-standard">Cargar</button>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
