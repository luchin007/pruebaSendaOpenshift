@extends('formMaestro')
@section('EquipoNuevo')               
                
                
 <script type="text/javascript">          
            function asignarId(){
                var indice1=document.getElementsByName("id_encargado")[0].value;
                var elemento1 = document.getElementsByName("id_encargado")[0].options[indice1].text;
                 var indice2=document.getElementsByName("id_oficina")[0].value;
                var elemento2 = document.getElementsByName("id_oficina")[0].options[indice2].text;
                 //alert(elemento1+elemento2);
               var encargado = elemento1.split(".");
               var oficina = elemento2.split(".");               
             document.getElementsByName("id_encargado")[0].value=encargado[0];
             document.getElementsByName("id_oficina")[0].value=oficina[0];        
             //alert(encargado[0]+oficina[0]);
            }
            function abrirVentana(){                
                document.getElementById("ventanaModal").style.display="block";
            }
            function cerrarVentana(){                
                document.getElementById("ventanaModal").style.display="none";
            }
            function guardarProgramas(){    
                
               var cantidad=document.getElementsByName("programa").length;
               var cadena="";
               var i=0;
               for(i=0;i<cantidad;i++){
                   if(true==document.getElementsByName("programa")[i].checked){
                       cadena+=document.getElementsByName("programa")[i].value+"_";
                    }                 
                }                   
              document.getElementById("ventanaModal").style.display="none";
              document.getElementById("ids_programas").value=cadena;
             }
            
</script>  


<div id="todoContenido">
         <h1>
             Insertar un nuevo Equipo  <br></h1>
    <table style="color: 'red'">
       {{ 
    Form::open(array('url' => 'insertar_equipo')) }}
      <tr><td> {{Form::label('1', 'Id Encargado')}}</td>
          <td>
              <select name="id_encargado">
                  <?php 
                        foreach ($lista_encargado as $lista_encargado){
                            echo '<option value="'.$lista_encargado->id_enc.'">'.$lista_encargado->nombre_enc.' '.$lista_encargado->apellido_enc.'</option>';
                        }
               ?>
              </select>
              
          
          </td>   </tr>
      <tr><td>  {{Form::label('2', 'Id Oficina')}}</td>
          <td>
              <select name="id_oficina">
                  <?php 
                        foreach ($lista_oficina as $lista_oficina){
                            echo '<option value="'.$lista_oficina->id_oficina.'">'.$lista_oficina->nombre_oficina.'</option>';                            
                        }
               ?>
              </select>          
          </td></tr>   
      <tr><td>  {{Form::label('3', 'Tipo de Equipo')}}</td><td> {{Form::select('tipo_eq', array('Computadora'=>'Computadora','Acces Point'=>'Acces Point','Servidor'=>'Servidor','Router'=>'Router','Modem'=>'Modem','Telefono'=>'Telefono','Impresora'=>'Impresora'))}}</td></tr>   
      <tr><td>  {{Form::label('4', 'Estado ')}}</td><td> {{Form::select('estado_eq',  array('Muy Bueno'=>'Muy Bueno','Bueno'=>"Bueno",'Regular'=>"Regular",'Malor'=>"Malo",'Muy Malo'=>"Muy Malo")      )}}</td></tr>     
      <tr><td>  {{Form::label('5', 'Numero en la of.')}}</td><td> {{Form::text('numero_por_of', '',array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'4'))}}</td></tr> 
      <tr><td>  {{Form::label('6', 'MAC')}}</td><td> {{Form::text('mac_eq', '',array('class' => 'form-control'))}}</td></tr> 
      <tr><td>  {{Form::label('7', 'IP')}}</td><td> {{Form::text('ip_eq', '',array('class' => 'form-control', 'pattern' => '[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}','maxlength'=>'17','title'=>'coloque direccion ip valida Ejm. 192.168.1.10'))}}</td></tr> 
      <tr><td>  {{Form::label('8', 'Marca')}}</td><td> {{Form::text('marca_eq', '',array('class' => 'form-control'))}}</td></tr> 
      <tr><td>  {{Form::label('8', 'Modelo')}}</td><td>{{Form::text('modelo_eq', '',array('class' => 'form-control'))}} </td></tr> 
      <tr><td>  {{Form::label('9', 'Año de adquision')}}</td><td> {{Form::text('fecha_compra_eq', '',array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'4'))}}</td></tr>
      <tr><td colspan="2">  {{Form::label('extra', 'Si es una computadora seleccione esta opcion')}}
                            <a href="javascript:abrirVentana();" id='abrirModal' class="btnRef">abrir</a>
      <div id="ventanaModal">
          <a href="javascript:guardarProgramas();" id='verProgramas' class="btnRef">Guardar</a> 
          <a href="javascript:cerrarVentana();" class="btnRef">Cerrar X</a>
          <h1>LLene los siguientes datos</h1>   
                  <table style="text-align: left">
                <tr><td colspan="2" >  </td><td> Seleccione los sofwares Instalados</td></tr> 
                
                <tr><td>  {{Form::label('10', 'Procesador')}}</td><td> {{Form::text('procesador', '')}}</td>
                    <td rowspan="10"> 
                        <?php 
                        $i=1;
                        foreach ($lista_programa as $lista_programa){
                            echo '<label><input type="checkbox" name="programa" value="'.$lista_programa->id_programa.'" checked="true"> '.$lista_programa->nombre_prog.'</label><BR>';
                            $i++;
                            /* dejo esto para luego quizas llega a ser muchos programas en la base de datos
                             * pense poner un limite de programas los mas conocidos y luego si se desea aumentar
                             * llenar un combo box con los programas restantes y un boton mas q añada otro combo para 
                             * seleccionar los demas programas                             *
                            if ($i==12){
                                break;
                            }   */                         
                        }
                        ?>
                        <BR>
                          
                       
                    </td>                    
                </tr> 
                <tr><td>  {{Form::label('11', 'Placa')}}</td><td> {{Form::text('placa', '')}}</td></tr> 
                <tr><td>  {{Form::label('12', 'RAM')}}</td><td> {{Form::text('ram', '')}}</td></tr> 
                <tr><td>  {{Form::label('13', 'Sistema Operativo')}}</td><td> {{Form::text('sistema_operativo', '')}}</td></tr> 
                <tr><td>  {{Form::label('14', 'Monitor')}}</td><td> {{Form::text('monitor', '')}}</td></tr> 
                <tr><td>  {{Form::label('15', 'Teclado')}}</td><td> {{Form::text('teclado', '')}}</td></tr> 
                <tr><td>  {{Form::label('16', 'Lectora')}}</td><td> {{Form::text('lectora', '')}}</td></tr> 
                <tr><td>  {{Form::label('17', 'Parlantes')}}</td><td> {{Form::text('parlantes', '')}}</td></tr> 
                <tr><td>  {{Form::label('18', 'Estabilizador')}}</td><td> {{Form::text('estabilizador', '')}}</td></tr> 
                <tr><td>  {{Form::label('19', 'Otros')}}</td><td> {{Form::text('otros', '')}}</td></tr>                 
                </table>
           
      </div>           
                            <input type="hidden" id="ids_programas" name="ids_programas" value="vacio">
      <tr><td> </td><td></td></tr>
      <tr><td> </td><td></td></tr>        
      <tr><td> {{Form::submit('Guardar',array('class' => 'btn btn-success'))}}
              {{ Form::close() }} </td><td></td></tr>
    
  </table>
              <br>
              <li><a href="nuevo_usuario"><img src="img/aumentar.png"><span></span></a></li>
        


              
</div>      

@stop