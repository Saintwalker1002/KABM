<?php
include_once('conexion.php');

$data = file_get_contents('php://input');
$datos = json_decode($data, true);
$usuario1=$datos['usuario'];
$password1=$datos['password'];

$sql="SELECT * FROM empresa WHERE usuario='$usuario1' and password='$password1'";
$resultado=mysqli_query($conexion, $sql);
$fila=mysqli_num_rows($resultado);

if($fila>0){
    session_start();
    $_SESSION['usuario']=$usuario1;

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