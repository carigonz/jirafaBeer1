<?php


session_start();
//echo "soy funciones.php";

function validarRegistro($datos){
  $errores =[];
  $datosFinales=[];

  //nombre
  if(strlen($datos["name"]) == 0){
    $errores["name"] = "Campo obligatorio.";
  } elseif (!preg_match('/^[\p{L} ]+$/u',$datos["name"])){
    $errores["name"] = "El nombre no puede contener números.";
  }

  //apellido
  if(strlen($datos["lastName"]) == 0){
    $errores["lastName"] = "Campo obligatorio.";
  } elseif(!preg_match('/^[\p{L} ]+$/u',$datos["lastName"])){
    $errores["lastName"] = "El apellido no puede contener números.";
  }

  //gender
  if(!isset($datos["gender"])){
    $errores["gender"]="Por favor, elija una opción.";
  }

  //email
  if(strlen($datos["email"])==0){
    $errores["email"]="Campo obligatorio.";
  } elseif (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
    $errores["email"]="Ingrese un email válido.";
  } 

  //pass
  if(strlen($datos["pass"])==0){
    $errores["pass"]="Campo obligatorio.";
  } elseif(strlen($datos["pass2"])==0){
    $errores["pass"]="Verifique la contraseña.";
  } elseif ($datos["pass"] != $datos["pass2"]){
    $errores["pass"]="Las contraseñas no coinciden.";
  }

  //adult
  if(!isset($datos["adult"])){
    $errores["adult"]="Debe aceptar los términos y condiciones.";
  }
  return $errores;
}

function actualizarRegistro($datos){
  $errores =[];

  //nombre
  if (isset($datos["name"])){
    if (strlen($datos["name"])==0){
      $errores["name"]="El campo no puede estar vacío.";
    }elseif (!preg_match('/^[\p{L} ]+$/u',$datos["name"])){
      $errores["name"] = "El nombre no puede contener números.";
    }
  }

  //apellido
  if (isset($datos["lastName"])){
    if(strlen($datos["lastName"]) == 0){
    $errores["lastName"] = "Campo obligatorio.";
    //la expresion regular no anda
    } elseif(!preg_match('/^[\p{L} ]+$/u',$datos["lastName"])){
    $errores["lastName"] = "El apellido no puede contener números.";
    }
  }

  //gender
 /*  if(!isset($datos["gender"])){
    $errores["gender"]="Por favor, elija una opción.";
  } */

  //email
  if (isset($datos["email"]) || isset($datos["email2"])){
    if(strlen($datos["email"])==0){
      $errores["email"]="El campo no puede estar vacío.";
    } elseif (strlen($datos["email2"])==0){
        $errores["email"]="El campo no puede estar vacío.";
    } elseif (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
      $errores["email"]="Ingrese un email válido.";
    } elseif (!filter_var($datos["email2"],FILTER_VALIDATE_EMAIL)) {
      $errores["email"]="Ingrese un email válido.";
    } elseif ($datos["email"]!=$datos["email2"]){
      $errores["email"]="las contraseñas no coinciden.";
    }
    //Y como valido si el mail esta registrado con otro nombre??
  } 


  //pass
  if (isset($datos["pass"])||isset($datos["pass22"])||isset($datos["pass3"])){
    if(strlen($datos["pass"])==0 || strlen($datos["pass2"])==0 || strlen($datos["pass3"])==0){
      $errores["pass"]="Campo obligatorio.";
    } elseif ($datos["pass2"] != $datos["pass3"]){
      $errores["pass"]="Las contraseñas no coinciden.";
    } elseif ($datos["pass"]==$datos["pass2"]) {
      $errores["pass"]="La contraseña no puede ser la misma.";
    }
    //elseif (la contraseña original no es correcta){
      //$errores["pass"]="La contraseña actual es incorrecta.";
    //} elseif (la contraseña original es correcta){
      //guardar en json $usuario["pass"] = pass2/pass3
    //}
}



  return $errores;
}



function buscarUsuario($email){
  //var_dump($email);
  if (!file_exists("db.json")){
    $json="";
  } else{
    $json=file_get_contents("db.json");
  }
  if ($json ==""){
    return null;
  }
  $array=json_decode($json,true);

  //var_dump($array);
  foreach ($array["usuarios"] as $position){
    if($position["email"] == $email){
      //var_dump($position);
      return $position;
    }
  }
  return null;
}


function lastID(){
  $json=file_get_contents("db.json");
  $array=json_decode($json,true);

  if(isset($array)==false){
    return $lastId=0;
  }
  
  $ultimoElemento=array_pop($array["usuarios"]);
  $lastId=$ultimoElemento["id"]+1;
  return $lastId;
}

function armarUsuario($array){

  return [
    "id"=>lastId(),
    "name"=>trim($array["name"]),
    "lastName"=>trim($array["lastName"]),
    "email"=>trim($array["email"]),
    "gender"=>$array["gender"],
    "pass"=>password_hash($array["pass"],PASSWORD_DEFAULT)
  ];
}

function guardarUsuario($user){

  $json=file_get_contents("db.json");
  $array=json_decode($json,true);
  $array["usuarios"][]=$user;
  //que hace json pretty print?
  $array=json_encode($array, JSON_PRETTY_PRINT);
  file_put_contents("db.json",$array);

}


function existeElUsuario($email){
  return buscarUsuario($email)!==null;
}


function validarLogin($datos){
  $errores =[];
  $datosFinales=[];

  foreach ($datos as $position => $valor){
    $datosFinales[$position]=trim($valor);
  }
  //email
  if(strlen($datosFinales["email"])==0){
    $errores["email"]="Campo obligatorio.";
  } elseif (!filter_var($datosFinales["email"],FILTER_VALIDATE_EMAIL)) {
    $errores["email"]="Ingrese un email válido.";
  } elseif (!existeElUsuario($datosFinales["email"])){
    $errores["email"]="El email no existe.";
  }

  //pass
  if(strlen($datosFinales["pass"])==0){
    $errores["pass"]="Campo obligatorio.";
  }  
  $usuario=buscarUsuario($datosFinales["email"]);
  if (!password_verify($datosFinales["pass"], $usuario["pass"])){
    $errores["pass"]= "La contraseña es incorrecta.";
  }
  



  return $errores;
}

function loguearUsuario($email){
  $_SESSION["email"]=$email;
}


function usuarioLogueado(){
  return isset($_SESSION["email"]);
}

function traerUsuarioLogueado(){
  if (isset($_SESSION["email"])){
    return buscarUsuario($_SESSION["email"]);
  }
  return false;
}

function setCookies($usuario){
  setCookie("name",$usuario["name"],time()+60*60*24*30);
  setCookie("email",$usuario["email"],time()+60*60*24*30);
  setCookie("pass",$usuario["pass"],time()+60*60*24*30);
}

?>