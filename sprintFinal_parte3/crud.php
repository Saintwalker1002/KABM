<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
$rut = (isset($_POST['rut'])) ? $_POST['rut'] : '';
$sexo = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$fecha_nacimiento = (isset($_POST['fecha_nacimiento'])) ? $_POST['fecha_nacimiento'] : '';
$estado_civil = (isset($_POST['estado_civil'])) ? $_POST['estado_civil'] : '';
$comuna = (isset($_POST['comuna'])) ? $_POST['comuna'] : '';
$edad = (isset($_POST['edad'])) ? $_POST['edad'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO datos (nombres, apellidos, rut, sexo, correo, fecha_nacimiento, estado_civil, comuna, edad) VALUES('$nombres', '$apellidos', '$rut', '$sexo', '$correo', '$fecha_nacimiento', '$estado_civil', '$comuna', '$edad') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT * FROM datos ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE datos SET nombres='$nombres', apellidos='$apellidos', rut='$rut', sexo='$sexo', correo='$correo', fecha_nacimiento='$fecha_nacimiento', estado_civil='$estado_civil', comuna='$comuna', edad='$edad' WHERE id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM datos WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM datos WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
