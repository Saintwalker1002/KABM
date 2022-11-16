<?php require_once "parte_superior.php"?>

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
            <button id="btnNuevo2" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
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
                                <th>Accion</th>
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
                                <td></td>   
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
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas2">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombres" class="col-form-label">Nombres:</label>
                <input type="text" class="form-control" id="nombres">
                </div>
                <div class="form-group">
                <label for="apellidos" class="col-form-label">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos">
                </div>                
                <div class="form-group">
                <label for="Vacaciones1(inicio)" class="col-form-label">Vacaciones1(inicio):</label>
                <input type="text" class="form-control" id="Vacaciones1_inicio">
                </div>
                <div class="form-group">
                <label for="Vacaciones1(final)" class="col-form-label">Vacaciones1(final):</label>
                <input type="text" class="form-control" id="Vacaciones1_final">
                </div>
                <div class="form-group">
                <label for="Vacaciones2(inicio)" class="col-form-label">Vacaciones2(inicio):</label>
                <input type="text" class="form-control" id="Vacaciones2_inicio">
                </div>
                <div class="form-group">
                <label for="vacaciones2(final)" class="col-form-label">Vacaciones2(final):</label>
                <input type="text" class="form-control" id="vacaciones2_final">
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  


</div>
<!--Fin del contenido principal-->

<?php require_once "parte_inferior.php"?>