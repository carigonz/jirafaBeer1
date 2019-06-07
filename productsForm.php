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
        <form action="#" method="post">
          <fieldset>
            <legend>Carga de Productos</legend>
            <label for=""></label>
            <input type="text" name="nombre" value="" />
            <br />
            Apellidos <br />
            <input type="text" name="apellidos" value="" />
            <br />
            DNI <br />
            <input type="text" name="dni" value="" size="10" maxlength="9" />
          </fieldset>

          <fieldset>
            <legend>Datos de conexión</legend>
            Nombre de usuario<br />
            <input type="text" name="nombre" value="" maxlength="10" />
            <br />
            Contraseña<br />
            <input type="password" name="password" value="" maxlength="10" />
            <br />
            Repite la contraseña<br />
            <input type="password" name="password2" value="" maxlength="10" />
          </fieldset>
        </form>

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

            <div class="form-group">
              <label for="lastName">Descripción (este campo se mostrará en las vistas del producto)</label>
              <input type="text" class="form-control" id="lastName"
              name="lastName" value="<?= isset($errores["lastName"]) ? "" : $lastNameOk ?>"
              style="<?= isset($errores["lastName"]) ? $redBackground : "" ?>">
              <span class="errores"
                ><?= isset($errores["lastName"]) ? $errores["lastName"] : "" ?></span
              >
            </div>

           <div class="form-group">
             <label for="style">Estilo de cerveza</label>
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
             <label for="presentation">Presentación (volumen)</label>
             <select name="presentation" id="">
               <option value="">elija una presentación</option>
               <optgroup label="cervezas">
                 <option value="bar50">Barril 50lts.</option>
                 <option value="litro">Botella de litro</option>
                 <option value="lata">Lata 473cc.</option>
               </optgroup>
             </select>
           </div>


           <div class="form-group">
             <label for="stock">Stock disponible para cargar</label>
             <input type="number" name="stock" class="form-control" id="stock">
           </div>

           <div class="form-group">
             <label for="price">Precio por unidad</label>
             <input type="number" name="price" class="form-control" id="stock">
           </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email"
              aria-describedby="emailHelp" value="<?= (isset($errores["email"]) && (!empty($_POST["register"]))) ? "" : $emailOk ?>"
              style="<?= (isset($errores["email"]) && (!empty($_POST["register"]))) ? $redBackground : "" ?>">
              <span class="errores"
                ><?= (isset($errores["email"]) && (!empty($_POST["register"]))) ? $errores["email"] : "" ?></span
              >
            </div>

            <div class="form-group">
              <label for="pass">Contraseña</label>
              <input type="password" class="form-control" id="pass" name="pass"
              maxlength="20" style="<?= (isset($errores["pass"]) && (!empty($_POST["register"]))) ? $redBackground : "" ?>"
              tabindex="17" autocapitalize="none" spellcheck="false"
              autocorrect="off" autocomplete="off" data-uid="5">
              <span class="errores"
                ><?= (isset($errores["pass"]) && (!empty($_POST["register"]))) ? $errores["pass"] : "" ?></span
              >
            </div>
            <div class="form-group">
              <label for="pass2">Repetí la contraseña</label>
              <input type="password" class="form-control" id="pass2"
              name="pass2" maxlength="20" style="<?= (isset($errores["pass"]) && (!empty($_POST["register"]))) ? $redBackground : "" ?>"
              tabindex="17" autocapitalize="none" spellcheck="false"
              autocorrect="off" autocomplete="off" data-uid="5">
              <span class="errores"
                ><?= (isset($errores["pass"]) && (!empty($_POST["register"]))) ? $errores["pass"] : "" ?></span
              >
            </div>

            <div class="form-group form-adult">
              <input
                type="checkbox"
                name="adult"
                class="form-check-adult"
                id="adult"
                value="adult"
              />
              <label class="form-check-label" for="adult"
                >Soy mayor de 18 años</label
              >
              <p class="term-conditions">
                Al registrarme, declaro que soy mayor de edad y acepto los
                Terminos y condiciones y las Políticas de privacidad.
              </p>
              <span class="errores"
                ><?= (isset($errores["adult"])) ? $errores["adult"] : "" ?></span
              >
            </div>
            <button
              type="submit"
              name="register"
              value="register"
              class="btn-standard"
            >
              Registrarme
            </button>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>