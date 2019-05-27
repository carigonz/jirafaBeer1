<?php

abstract class DB 
{
	public abstract function guardarUsuario(Usuario $usuario);
	public abstract function buscarUsuario($email);
}
