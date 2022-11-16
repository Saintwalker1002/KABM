$(document).ready(function(){
    tablaPersonas4 = $("#tablaPersonas4").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
         
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo4").click(function(){
    $("#formPersonas4").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro

    
$("#formPersonas4").submit(function(e){
    e.preventDefault();    
    nombres = $.trim($("#nombres2").val());
    apellidos = $.trim($("#apellidos2").val());
    rut = $.trim($("#rut2").val());
    sexo = $.trim($("#sexo2").val());
    correo = $.trim($("#correo2").val());
    fecha_nacimiento = $.trim($("#fecha_nacimiento2").val());
    estado_civil = $.trim($("#estado_civil2").val());
    comuna = $.trim($("#comuna2").val());
    edad = $.trim($("#edad2").val());    
    $.ajax({
        url: "crud.php",
        type: "POST",
        dataType: "json",
        data: {nombres:nombres, apellidos:apellidos, rut:rut, sexo:sexo, correo:correo, fecha_nacimiento:fecha_nacimiento, estado_civil:estado_civil, comuna:comuna, edad:edad, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombres = data[0].nombres;
            apellidos = data[0].apellidos;
            rut = data[0].rut;
            sexo = data[0].sexo;
            correo = data[0].correo;
            fecha_nacimiento = data[0].fecha_nacimiento;
            estado_civil = data[0].estado_civil;
            comuna = data[0].comuna;
            edad = data[0].edad;
            if(opcion == 1){tablaPersonas4.row.add([id,nombres,apellidos,rut,sexo,correo,fecha_nacimiento,estado_civil,comuna,edad]).draw();}
            else{tablaPersonas4.row(fila).data([id,nombres,apellidos,rut,sexo,correo,fecha_nacimiento,estado_civil,comuna,edad]).draw();}
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});