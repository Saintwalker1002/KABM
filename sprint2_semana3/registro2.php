<?php
include_once('db.php');
$Nombre= $_POST['Nombre'];
$apellido= $_POST['Apellido'];
$email= $_POST['email'];
$Clave= $_POST['Clave'];
$Confirmar= $_POST['Confirmar'];

echo "los datos son los siguientes: <br>";
echo "$Nombre,$apellido,$email,$Clave y $Confirmar";

                $conectar=conn();
                $sql="INSERT INTO  registro (Nombre, Apellido, email, Clave, Confirmar)
                VALUES ('$Nombre', '$apellido', '$email', '$Clave', '$Confirmar')";
                $resul = mysqli_query($conectar, $sql) or trigger_error("Query Failed! SQL- ERROR: ".mysqli_error($conectar), E_USER_ERROR);
                echo "$sql";

?>