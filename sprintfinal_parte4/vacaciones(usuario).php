<?php require_once "parte_superior(usuario).php"?>

<!--Inicio del contenido principal-->
<div class="container">
    <h6></h6>
<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM vacaciones";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>    
 
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas2" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>                                
                                <th>vacaciones 1 (inicio)</th>  
                                <th>vacaciones 1 (fin)</th>
                                <th>vacaciones 2 (inicio)</th>
                                <th>vacaciones 2 (fin)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id_vacaciones'] ?></td>
                                <td><?php echo $dat['nombres'] ?></td>
                                <td><?php echo $dat['apellidos'] ?></td>
                                <td><?php echo $dat['vacaciones1_inicio'] ?></td>
                                <td><?php echo $dat['vacaciones1_final'] ?></td>
                                <td><?php echo $dat['vacaciones2_inicio'] ?></td>
                                <td><?php echo $dat['vacaciones2_final'] ?></td> 
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