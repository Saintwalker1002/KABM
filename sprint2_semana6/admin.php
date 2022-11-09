<?php require_once "parte_superior.php"?>

<!--Inicio del contenido principal-->
<div class="contenedor2">
    <h6>contenido principal</h6>
<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM kabm";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>    
      
    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>                                
                                <th>Rut</th>  
                                <th>Fecha de nacimiento</th>
                                <th>Sexo</th>
                                <th>Email</th>
                                <th>Edad</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id_empleados'] ?></td>
                                <td><?php echo $dat['nombres'] ?></td>
                                <td><?php echo $dat['apellidos'] ?></td>
                                <td><?php echo $dat['Rut'] ?></td>
                                <td><?php echo $dat['fecha_de_naciemiento'] ?></td>
                                <td><?php echo $dat['sexo'] ?></td>
                                <td><?php echo $dat['email'] ?></td>
                                <td><?php echo $dat['edad'] ?></td>
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
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombres:</label>
                <input type="text" class="form-control" id="nombres">
                </div>
                <div class="form-group">
                <label for="pais" class="col-form-label">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos">
                </div>                
                <div class="form-group">
                <label for="edad" class="col-form-label">Rut:</label>
                <input type="number" class="form-control" id="Rut">
                </div>
                <div class="form-group">
                <label for="nombre" class="col-form-label">Fecha de nacimiento:</label>
                <input type="text" class="form-control" id="fecha_de_naciemiento">
                </div>
                <div class="form-group">
                <label for="nombre" class="col-form-label">Sexo:</label>
                <input type="text" class="form-control" id="sexo">
                </div>
                <div class="form-group">
                <label for="nombre" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="email">
                </div>
                <div class="form-group">
                <label for="nombre" class="col-form-label">Edad:</label>
                <input type="text" class="form-control" id="edad">
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