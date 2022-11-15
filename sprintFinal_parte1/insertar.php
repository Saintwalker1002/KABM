<?php
include("conexion.php");
/// Obtenemos el json enviado
$data = file_get_contents('php://input');
// Los convertimos en un array
$datos=json_decode($data,true);

$nombres1=$datos['nombres'];
$apellidos1=$datos['apellidos'];
$usuario1=$datos['usuario'];
$correo1=$datos['correo'];
$password1=$datos['password'];
$password_c1=$datos['password_c'];

$sql = "INSERT INTO empresa (nombres, apellidos, usuario, correo, password, password_c) VALUES ('$nombres1', '$apellidos1', '$usuario1', '$correo1', '$password1', '$password_c1')";
if (mysqli_query($conexion, $sql)) {
        echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>