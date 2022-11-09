<?php
include_once 'conexion.php';

/// Obtenemos el json enviado
$data = file_get_contents('php://input');
// Los convertimos en un array
$datos=json_decode($data,true);

$nombres=$datos['nombres'];
$apellidos=$datos['apellidos'];
$correo=$datos['correo'];
$Rut=$dato['Rut'];
$sexo=$dato['sexo'];
$fecha_nacimiento=$dato['fecha_nacimiento'];
$estado_civil=$dato['estado_civil'];
$comuna=$dato['comuna'];
$contraseña=$dato['contraseña'];
$c_contraseña=$dato['c_contraseña'];

$sql = "INSERT INTO empresa (nombres, apellidos, rut, sexo, correo, fecha_nacimiento, estado_civil, comuna, contraeña, c_contraseña) VALUES ('$nombres', '$apellidos', '$correo','$Rut','$sexo','$fecha_nacimiento','$estado_civil','$comuna','$contraseña','$c_contraseña')";
if (mysqli_query($conexion, $sql)) {
        echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>