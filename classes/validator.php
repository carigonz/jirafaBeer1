<?php

require_once "dbmysql.php";

$dbMysql= new DbMysql;


class Validator {

	public static function validarRegistro($datos){
		$errores =[];
		$datosFinales=[];
		global $dbMysql;
	
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
	
	public static function actualizarRegistro($datos){
		$errores =[];
		global $dbMysql;
	
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
				$errores["email"]="los mails no coinciden.";
			}
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
	}
		return $errores;
	}

	public static function validarLogin($datos){
		$errores =[];
		$datosFinales=[];
		global $dbMysql;
	
		foreach ($datos as $position => $valor){
			$datosFinales[$position]=trim($valor);
		}
		//email
		if(strlen($datosFinales["email"])==0){
			$errores["email"]="Campo obligatorio.";
		} elseif (!filter_var($datosFinales["email"],FILTER_VALIDATE_EMAIL)) {
				$errores["email"]="Ingrese un email válido.";
			} elseif ($dbMysql->existeElUsuario($datosFinales["email"])==NULL){
				$errores["email"]="El email no existe.";
			}
	
		//pass
		if(strlen($datosFinales["pass"])==0){
			$errores["pass"]="Campo obligatorio.";
		}  
		$usuario=$dbMysql->buscarUsuario($datosFinales["email"]);

		/* var_dump($usuario);
		echo "<br>";
		var_dump($datosFinales["pass"]);
		echo "<br>"; 
		$passDB = $usuario->getPass();
		var_dump($usuario); 
		echo "<br>";
		exit; 
		$passDB = $usuario->getPass();
		var_dump($passDB);
		echo "<br>";
		var_dump($datosFinales["pass"]);
		$hola = password_verify($datosFinales["pass"], $passDB);
		echo "<br>";
		var_dump($hola);
		exit; */
		
		if ($usuario=== NULL){
			$errores["pass"]= "El usuario no se encuentra registrado. Por favor, regístrese.";
		} else{
			$passDB = $usuario->getPass();
			if (!password_verify($datosFinales["pass"], $passDB)){
				$errores["pass"]= "La contraseña es incorrecta.";
			}
		}
		return $errores;
	}

}

//$_POST["email"]= "carolinagonzalez794@gmail.com";
//$_POST["pass"]= 123;

//$errores = Validator::validarLogin($_POST);
//var_dump($errores);
//echo "<br>";