 function buscarConsulta(){      
            if(document.getElementById("txtBuscar").value!=""){       
                location.href=document.getElementById("dirHidden").value+""+document.getElementById("txtBuscar").value;
                //aqui hice un forma para mi script sea general solo vario abajo en la opcion del hidden dirHidden
            }
            else{
                location.href=document.getElementById("dirHidden").value+"vacio"
            }
}
 function validarNumeros(evt){
                var keynum=evt.keyCode||evt.which;
            
        if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
              return true;
             }
             else{
              return false;
             }
            }
function validarNombreUsuario(evt){
       var keynum=evt.keyCode||evt.which; 
      
        if(keynum == 32){
              return false;
             }
             else{
              return true;
             }
            
}
function compararContraseña(){
      var contra1 =document.getElementById("contraseña1").value;
       var contra2 =document.getElementById("contraseña2").value;
      if(contra1==contra2){
           document.getElementById("contraseña").value=contra1;
           return true;
       }
       else{
            alert("las contraseñas no coinciden intentelo denuevo");
            return false;
            
       }
           
      
       
            
}

