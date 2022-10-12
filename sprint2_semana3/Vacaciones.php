<?php
    $conexion =  mysqli_connect('localhost','root','','kabm');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_version2.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--Datatable plugin CSS file -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
    <!--jQuery library file -->
    <script type="text/javascript" 
        src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
  
    <!--Datatable plugin JS library file -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <title>Vacaciones</title>
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
        
        <div class="container">
            <div class="row">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Rut</th>
                        <th>Fecha de inicio (1)</th>
                        <th>Fecha de termino (1)</th>
                        <th>Fecha de inicio (2)</th>
                        <th>Fecha de termino (2)</th>
                        <th>Fecha de inicio (3)</th>
                        <th>Fecha de termino (3)</th>
                    </tr>
                    <?php
                        $sql = "SELECT nombres, apellidos, Rut, vacaciones_inicio, vacaciones_termino from vacaciones; from kamb";
                        $result = mysqli_query($conexion,$sql);

                        while($mostrar = mysqli_fetch_array($result)) {
                    ?>
                </thead>
                
            <tbody>
                <tr>
                    <td><?php echo $mostrar['nombres']?></td>
                    <td><?php echo $mostrar['apellidos']?></td>
                    <td><?php echo $mostrar['Rut']?></td>
                    <td><?php echo $mostrar['fecha_vacaciones1']?></td>
                    <td><?php echo $mostrar['fecha_fin_vacaciones1']?></td>
                    <td><?php echo $mostrar['fecha_vacaciones2']?></td>
                    <td><?php echo $mostrar['fecha_fin_vacaciones2']?></td>
                    <td><?php echo $mostrar['fecha_vacaciones3']?></td>
                    <td><?php echo $mostrar['fecha_fin_vacaciones3']?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
            </table>
            </div>
        </div>
        
    </div>
    <footer id="pie">
    </footer>
</body>
<script>
    /* Initialization of datatables */
    $(document).ready(function () {
    $('table.display').DataTable();
    });
</script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>