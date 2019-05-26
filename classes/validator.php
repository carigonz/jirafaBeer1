<?php


class Validator {

	public static function validarRegistro($datos){
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
	
	

	public static function validarLogin($datos){
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

}