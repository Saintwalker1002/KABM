<?php require_once "parte_superior.php"?>

<!--Inicio del contenido principal-->
<div class="contenedor2">
    <h6>contenido principal</h6>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>

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
                <label for="nombres" class="col-form-label">Nombres:</label>
                <input type="text" class="form-control" id="nombres">
                </div>
                <div class="form-group">
                <label for="apellidos" class="col-form-label">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos">
                </div>                
                <div class="form-group">
                <label for="rut" class="col-form-label">Rut:</label>
                <input type="text" class="form-control" id="rut">
                </div>
                <div class="form-group">
                <label for="sexo" class="col-form-label">Sexo:</label>
                <input type="text" class="form-control" id="sexo">
                </div>
                <div class="form-group">
                <label for="correo" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="correo">
                </div>
                <div class="form-group">
                <label for="fecha_nacimiento" class="col-form-label">Fecha de nacimiento:</label>
                <input type="text" class="form-control" id="fecha_nacimiento">
                </div>
                <div class="form-group">
                <label for="estado_civil" class="col-form-label">Estado civil:</label>
                <input type="text" class="form-control" id="estado_civil">
                </div>
                <div class="form-group">
                <label for="comuna" class="col-form-label">Comuna:</label>
                <input type="text" class="form-control" id="comuna">
                </div>
                <div class="form-group">
                <label for="edad" class="col-form-label">Edad:</label>
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