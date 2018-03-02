@extends('formMaestro')
@section('EquipoNuevo')               
<link rel="stylesheet" type="text/css" href="css/cssModal.css">
  <script type="text/javascript">   
            
            function guardarProgramas(){ 
              
              var cantidad=document.getElementsByName("programa").length;
              var cadena="";
              var i=0;
              for(i=0;i<cantidad;i++){
                  if(true===document.getElementsByName("programa")[i].checked){
                       cadena+=document.getElementsByName("programa")[i].value+"_";
                  }                  
                }                   
            document.getElementById("ids_programas").value=cadena;            
             }
            
</script>  
   
<div id="todoContenido">
         <h1>
             Modificar Equipo  {{$equipo->id_eq}}     <br></h1>
    <table>
        <tr><td>
            <table>
                {{ Form::open(array('url' => 'modificando_equipo')) }}     
               {{Form::hidden('id_eq',$equipo->id_eq)}}
               <input type="hidden" id="ids_programas" name="ids_programas" value="vacio"
               <tr><td> {{Form::label('1', 'Id Encargado')}}</td>
                   <td>
                       <select name="id_encargado">
                        <?php 
                              foreach ($lista_encargado as $lista_encargado){
                                  if($lista_encargado->id_enc==$equipo->id_encargado){
                                   echo '<option value="'.$lista_encargado->id_enc.'" selected>'.$lista_encargado->nombre_enc.' '.$lista_encargado->apellido_enc.'</option>';
                                  }
                                  else{
                                       echo '<option value="'.$lista_encargado->id_enc.'">'.$lista_encargado->nombre_enc.' '.$lista_encargado->apellido_enc.'</option>';
                                 }
                              }
                        ?>        
                        </select>
                   </td>   </tr>
               <tr><td>  {{Form::label('2', 'Id Oficina')}}</td>
                   <td>
                    <select name="id_oficina">
                            <?php 
                           foreach ($lista_oficina as $lista_oficina){
                               if($lista_oficina->id_oficina==$equipo->id_oficina){
                                   echo '<option value="'.$lista_oficina->id_oficina.'" selected>'.$lista_oficina->nombre_oficina.'</option>';                            
                               }
                               else{
                                   echo '<option value="'.$lista_oficina->id_oficina.'">'.$lista_oficina->nombre_oficina.'</option>';
                               }

                           }
                           ?>
                       </select>
                   </td></tr>
               <tr><td>  {{Form::label('3', 'Tipo de Equipo')}}</td><td> {{Form::text('tipo_eq',$equipo->tipo_eq,array('class' => 'form-control'))}}</td></tr>   
               <tr><td>  {{Form::label('4', 'Estado ')}}</td><td> {{Form::text('estado_eq',$equipo->estado_eq,array('class' => 'form-control'))}}</td></tr>     
               <tr><td>  {{Form::label('5', 'Numero en la of.')}}</td><td> {{Form::text('numero_por_of', $equipo->numero_por_of,array('class' => 'form-control'))}}</td></tr> 
               <tr><td>  {{Form::label('6', 'MAC')}}</td><td> {{Form::text('mac_eq', $equipo->mac_eq,array('class' => 'form-control'))}}</td></tr> 
               <tr><td>  {{Form::label('7', 'IP')}}</td><td> {{Form::text('ip_eq', $equipo->ip_eq,array('class' => 'form-control'))}}</td></tr> 
               <tr><td>  {{Form::label('8', 'Marca')}}</td><td> {{Form::text('marca_eq', $equipo->marca_eq,array('class' => 'form-control'))}}</td></tr> 
               <tr><td>  {{Form::label('8', 'Modelo')}}</td><td>{{Form::text('modelo_eq', $equipo->modelo_eq,array('class' => 'form-control'))}} </td></tr> 
               <tr><td>  {{Form::label('9', 'Año de adquision')}}</td><td> {{Form::text('fecha_compra_eq', $equipo->fecha_compra_eq,array('class' => 'form-control'))}}</td></tr>
               
            </table>
            </td>
            <td>
                <table>
                <tr><td> {{Form::label('10', 'Procesador')}}</td><td> {{Form::text('procesador',$equipo->procesador,array('class' => 'form-control'))}}</td></tr> 
                <tr><td> {{Form::label('11', 'Placa')}}</td><td> {{Form::text('placa',$equipo->placa,array('class' => 'form-control'))}}</td></tr> 
                <tr><td>  {{Form::label('12', 'RAM')}}</td><td> {{Form::text('ram', $equipo->ram,array('class' => 'form-control'))}}</td></tr> 
                <tr><td>  {{Form::label('13', 'Sistema Operativo')}}</td><td> {{Form::text('sistema_operativo',$equipo->sistema_operativo,array('class' => 'form-control'))}}</td></tr> 
                <tr><td>  {{Form::label('14', 'Monitor')}}</td><td> {{Form::text('monitor',$equipo->monitor,array('class' => 'form-control'))}}</td></tr> 
                <tr><td>  {{Form::label('15', 'Teclado')}}</td><td> {{Form::text('teclado',$equipo->teclado,array('class' => 'form-control'))}}</td></tr> 
                <tr><td>  {{Form::label('16', 'Lectora')}}</td><td> {{Form::text('lectora',$equipo->lectora,array('class' => 'form-control'))}}</td></tr> 
                <tr><td>  {{Form::label('17', 'Parlantes')}}</td><td> {{Form::text('parlantes',$equipo->parlantes,array('class' => 'form-control'))}}</td></tr> 
                <tr><td>  {{Form::label('18', 'Estabilizador')}}</td><td> {{Form::text('estabilizador',$equipo->estabilizador,array('class' => 'form-control'))}}</td></tr> 
                <tr><td>  {{Form::label('19', 'Otros')}}</td><td> {{Form::text('otros',$equipo->otros,array('class' => 'form-control'))}}</td></tr>          
                </table>
            </td>
            <td>
                <h1>Progamas instalados</h1>                
                    <?php    
                            $estado="no";
                            $array=array();
                             foreach($programa as $programa){                                            
                                array_push($array, $programa->id_programa);
                             }
                    
                                 foreach ($lista_programa as $lista_programa){
                                      for ($i=0;$i<count($array);$i++){
                                        if($lista_programa->id_programa==$array[$i]){  
                                            $estado="si";
                                        }                                         
                                      }
                                       if($estado=="si"){
                                           echo '<label><input type="checkbox" name="programa" value="'.$lista_programa->id_programa.'" checked="true"> '.$lista_programa->nombre_prog.'</label><BR>';
                                        }
                                        else {
                                           echo '<label><input type="checkbox" name="programa" value="'.$lista_programa->id_programa.'" > '.$lista_programa->nombre_prog.'</label><BR>';
                                     }
                                     $estado="no";

                                 }      
                                 
                                 
                    
                     ?>
                  
                
                <BR>
            </td>
               
           
      </div>           
                              
      <tr><td> 
              
               {{Form::submit('Modificar',array('onClick'=>'guardarProgramas()'))}}
              {{ Form::close() }} </td><td></td></tr>
    
  </table>
              <br>
              <li><a href="nuevo_usuario"><img src="img/aumentar.png"><span></span></a></li>
        
              
              
</div>      

@stop