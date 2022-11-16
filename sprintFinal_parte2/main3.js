var xmlhttp = new XMLHttpRequest();

function iniciosesion(){
    var usuario=document.getElementById('usuario').value;
    var password=document.getElementById('password').value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status==200){
            res=JSON.parse(this.responseText);
            if (res.access == true){
                 location.href="";
            }
            else{
                alert("Usuario y clave Incorrectos!!!!!");
            }
            
        }
    }
    xmlhttp.open("POST", "registrar2.php", true);
    xmlhttp.setRequestHeader("Content-type","application/json");
    xmlhttp.send(JSON.stringify({usuario:usuario, password:password}));
    
}