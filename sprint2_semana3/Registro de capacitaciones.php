<?php
    $conexion =  mysqli_connect('localhost','root','','');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_version2.css">
    <title>Document</title>
</head>
<body id="contenedor">
        
    <div class="fondo"></div>

    <div class="sobrepocision">
        <nav id="navegador">
            <h3 class="logo">
                <img src="Loginho.png" alt="">
            </h3>
            <h3 class="menu">Menu</h3>
            <h3 class="usuario">Usuario</h3>
        </nav>
        <aside class="filtros">
            <div class="line">
            <h4>filtros de busqueda</h4>
            <input class="control" type="text" placeholder="Nombre">
            <input class="control" type="text" placeholder="Apellido">
            <input class="control" type="text" placeholder="Rut">
            <input class="control" type="text" placeholder="Fecha">
            <p></p>
            <input type="submit" value="Ordenar y filtrar">
            </div>
        </aside>
        <table class="tabla" style="width: 60%;">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Rut</th>
                <th>registro de contratacion</th>
            </tr>
            <tr>
                <td>Martin</td>
                <td>Vallejo</td>
                <td>20.726.970-0</td>
                <td>08/01/22</td>
            </tr>
            <tr>
                <td>Barbara</td>
                <td>Constanza</td>
                <td>27.626.190-0</td>
                <td>11/05/22</td>
            </tr>
        </table>
    </div>
    <footer >
    </footer>
</body>
</html>