<?php
 $bd = mysqli_connect("localhost","root", "","kabm");

  $nombre_completo = $_POST['nombre_completo'];
  $apellidos = $_POST['apellidos'];
  $Rut = $_POST['Rut'];
  $fecha_de_nacimiento = $_POST['fecha_de_nacimiento'];
  $sexo = $_POST['sexo'];
  $email = $_POST['email'];

$respuesta = mysqli_query($bd, "CALL (".$nombre_completo.",".$apellidos.",".$Rut.",".$fecha_de_nacimiento.",".$sexo.",".$email.")");

if ($respuesta){
	echo "felicidades a sido registrado";

}
else{
	echo "Ocurrió un error en el rregistro vuelva a intentarlo";
}
?>