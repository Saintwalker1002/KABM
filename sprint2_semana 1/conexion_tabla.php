<?php

Class conexion{
public static function conectar(){
define('servidor', 'localhost');
define('nombre_bd', 'kabm 3');
define('usuario', 'root');
define('password', '');

$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try{
	$conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, passwod, $opciones);
	return $conexion;
}cath (exception $e){
	die("el error de conexion es: ". $e->getMessge());
}

}

}

?>