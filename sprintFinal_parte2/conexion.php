<?php

$conexion=mysqli_connect("localhost","root","","kabm");

if($conexion){
    return $conexion;
}else{
    echo "Error al conectar a la BD";
}

?>