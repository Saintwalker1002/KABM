var xmlhttp = new XMLHttpRequest();

function guardar(){
       
    var nombres = document.getElementById('nombres').value;
    var apellidos = document.getElementById('apellidos').value;
    var usuario = document.getElementById('usuario').value;
    var correo = document.getElementById('correo').value;
    var password = document.getElementById('password').value;
    var password_c = document.getElementById('password_c').value;
       
   
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200){
            mostrar_datos();
            document.getElementById('formulario').reset()
        }
    }
    xmlhttp.open("POST","insertar2.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/json");
    xmlhttp.send(JSON.stringify({nombres:nombres, apellidos:apellidos, usuario:usuario, correo:correo, password:password, password_c:password_c}));
       
   
}