var xmlhttp = new XMLHttpRequest();

function iniciosesion(){
    var usuario=document.getElementById('correo').value;
    var password=document.getElementById('contraseña').value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status==200){
            res=JSON.parse(this.responseText);
            if (res.access == true){
                location.href="index.php";
            }
            else{
                alert("Usuario y clave Incorrectos!!!!!");
            }
            
        }
    }
    xmlhttp.open("POST", "registrar.php", true);
    xmlhttp.setRequestHeader("Content-type","application/json");
    xmlhttp.send(JSON.stringify({usuario:usuario, password:password}));
    
}

function limpiar(){
    document.getElementById('formulario').reset()
    document.getElementById('id').value=" "
}


function guardar(){
    
    var nombres = document.getElementById('nombres').value;
    var apellidos = document.getElementById('apellidos').value;
    var Rut = document.getElementById('Rut').value;
    var sexo = document.getElementById('sexo').value;
    var correo = document.getElementById('correo').value;
    var fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
    var estado_civil = document.getElementById('estado_civil').value;
    var comuna = document.getElementById('comuna').value;
    var contraseña = document.getElementById('contraseña').value;
    var c_contraseña = document.getElementById('c_contraseña').value;

    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200){
            document.getElementById('formulario').reset()
        }
    }
    xmlhttp.open("POST","insertar.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/json");
    xmlhttp.send(JSON.stringify({nombres:nombres, apellidos:apellidos, Rut:Rut, sexo:sexo, correo:correo, fecha_nacimiento:fecha_nacimiento, estado_civil:estado_civil, comuna:comuna, contraseña:contraseña, c_contraseña:c_contraseña}));


}