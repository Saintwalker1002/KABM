<?php
include_once 'conexion.php';

$correo=['correo'];
$contraseña=['contraseña'];

$data = file_get_contents('php://input');
$datos = json_decode($data, true);
$usuario1=$datos['usuario'];
$password1=$datos['password'];

if($usuario1==$correo && $password1==$contraseña){
    session_start();
    $_SESSION['usuario1']=$usuario;

    $access=true;
}
else{
    $access=false;
}

echo json_encode([
    'usuario'=> $usuario1,
    'password' => $password1,
    'access' =>$access
]);

?>