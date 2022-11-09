$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
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
    
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
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
    Rut = fila.find('td:eq(3)').text();
    fecha_de_naciemiento = parseInt(fila.find('td:eq(4)').text());
    sexo = fila.find('td:eq(5)').text();
    email = fila.find('td:eq(6)').text();
    edad = parseInt(fila.find('td:eq(7)').text());
    
    $("#nombres").val(nombres);
    $("#apellidos").val(apellidos);
    $("#Rut").val(Rut);
    $("#fecha_de_naciemiento").val(fecha_de_naciemiento);
    $("#sexo").val(sexo);
    $("#email").val(email);
    $("#edad").val(edad);    
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
                tablaPersonas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    nombres = $.trim($("#nombres").val());
    apellidos = $.trim($("#apellidos").val());
    Rut = $.trim($("#Rut").val());
    fecha_de_naciemiento = $.trim($("#fecha_de_naciemiento").val());
    sexo = $.trim($("#sexo").val());
    email = $.trim($("#email").val());
    edad = $.trim($("#edad").val());    
    $.ajax({
        url: "crud.php",
        type: "POST",
        dataType: "json",
        data: {nombres:nombres, apellidos:apellidos, Rut:Rut, fecha_de_naciemiento:fecha_de_naciemiento, sexo:sexo, email:email, edad:edad, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombres = data[0].nombres;
            apellidos = data[0].apellidos;
            Rut = data[0].Rut;
            fecha_de_naciemiento = data[0].fecha_de_naciemiento;
            sexo = data[0].sexo;
            email = data[0].email;
            edad = data[0].edad;
            if(opcion == 1){tablaPersonas.row.add([id,nombres,apellidos,Rut,fecha_de_naciemiento,sexo,email,edad]).draw();}
            else{tablaPersonas.row(fila).data([id,nombres,apellidos,Rut,fecha_de_naciemiento,sexo,email,edad]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});