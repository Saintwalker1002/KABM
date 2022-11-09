<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
$Rut = (isset($_POST['Rut'])) ? $_POST['Rut'] : '';
$fecha_de_naciemiento = (isset($_POST['fecha_de_naciemiento'])) ? $_POST['fecha_de_naciemiento'] : '';
$sexo = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$edad = (isset($_POST['edad'])) ? $_POST['edad'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id_empleados'])) ? $_POST['id_empleados'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO kabm (nombres, apellidos, Rut, fecha_de_naciemiento, sexo, email, edad) VALUES('$nombres', '$apellidos', '$Rut', '$fecha_de_naciemiento', '$sexo', '$email', '$edad') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT * FROM kabm ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE kabm SET nombres='$nombres', apellidos='$apellidos', Rut='$Rut', fecha_de_naciemiento='$fecha_de_naciemiento', sexo='$sexo', email='$email', edad='$edad' WHERE id_empleados='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM kabm WHERE id_empleados='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM kabm WHERE id_empleados='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
