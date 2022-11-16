<?php require_once "parte_superior(usuario).php"?>

<!--Inicio del contenido principal-->
<div class="contenedor2">
    <h6></h6>
<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM datos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>    
        
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas4" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>                                
                                <th>Rut</th>  
                                <th>Sexo</th>
                                <th>Email</th>
                                <th>Fecha de nacimiento</th>
                                <th>Estado civil</th>
                                <th>Comuna</th>
                                <th>Edad</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['nombres'] ?></td>
                                <td><?php echo $dat['apellidos'] ?></td>
                                <td><?php echo $dat['rut'] ?></td>
                                <td><?php echo $dat['sexo'] ?></td>
                                <td><?php echo $dat['correo'] ?></td>
                                <td><?php echo $dat['fecha_nacimiento'] ?></td>
                                <td><?php echo $dat['estado_civil'] ?></td>
                                <td><?php echo $dat['comuna'] ?></td>
                                <td><?php echo $dat['edad'] ?></td>   
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    

</div>
<!--Fin del contenido principal-->

<?php require_once "parte_inferior(usuario).php"?>