$(document).ready(function(){
    tablaPersonas2 = $("#tablaPersonas2").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
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
    
$("#btnNuevo2").click(function(){
    $("#formPersonas2").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombres = fila.find('td:eq(1)').text();
    apellidos = fila.find('td:eq(2)').text();
    vacaciones1_inicio = fila.find('td:eq(3)').text();
    vacaciones1_final = fila.find('td:eq(4)').text();
    vacaciones2_inicio = fila.find('td:eq(5)').text();
    vacaciones2_final = parseInt(fila.find('td:eq(6)').text());
    
    
    $("#nombres").val(nombres);
    $("#apellidos").val(apellidos);
    $("#vacaciones1_inicio").val(vacaciones1_inicio);
    $("#vacaciones1_final").val(vacaciones1_final);
    $("#vacaciones2_inicio").val(vacaciones2_inicio);
    $("#vacaciones2_final").val(vacaciones2_final);    
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPersonas2.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    nombres = $.trim($("#nombres").val());
    apellidos = $.trim($("#apellidos").val());
    vacaciones1_inicio = $.trim($("#vacaciones1_inicio").val());
    vacaciones1_final = $.trim($("#vacaciones1_final").val());
    vacaciones2_inicio = $.trim($("#vacaciones2_inicio").val());
    vacaciones2_final = $.trim($("#vacaciones2_final").val());
    
    $.ajax({
        url: "crud.php",
        type: "POST",
        dataType: "json",
        data: {nombres:nombres, apellidos:apellidos, vacaciones1_inicio:vacaciones1_inicio, vacaciones1_final:vacaciones1_final, vacaciones2_inicio:vacaciones2_inicio, vacaciones2_final:vacaciones2_final, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombres = data[0].nombres;
            apellidos = data[0].apellidos;
            vacaciones1_inicio = data[0].rut;
            vacaciones1_final = data[0].sexo;
            vacaciones2_inicio = data[0].correo;
            vacaciones2_final = data[0].fecha_nacimiento;
            if(opcion == 1){tablaPersonas2.row.add([id,nombres,apellidos,vacaciones1_inicio,vacaciones1_final,vacaciones2_inicio,vacaciones2_final]).draw();}
            else{tablaPersonas2.row(fila).data([id,nombres,apellidos,vacaciones1_inicio,vacaciones1_final,vacaciones2_inicio,vacaciones2_final]).draw();}
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});