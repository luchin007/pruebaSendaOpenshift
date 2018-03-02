@extends('formMaestro')
@section('EquipoNuevo')               
<div id="todoContenido">
         <h1>
             Detalle Equipo  <br></h1>
    <div class="divsResponsive">
            <table>
                {{ Form::open(array('url' => 'insertar_equipo')) }}
              
               <tr><td> {{Form::label('1', 'Id Equipo')}}</td>
                   <td>{{Form::text('id_encargado',$equipo->id_eq,array('class' => 'form-control','readonly' => 'readonly'))}} 
                   
                   </td>   </tr>
               <tr><td> {{Form::label('1', 'Id Encargado')}}</td>
                   <td>
                       <select name="id_encargado" disabled="true" >
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
                       <select name="id_oficina" disabled="true">
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
               <tr><td>  {{Form::label('3', 'Nombre Equipo')}}</td><td> {{Form::text('tipo_eq',$equipo->tipo_eq,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr>   
               <tr><td>  {{Form::label('4', 'Estado ')}}</td><td> {{Form::text('estado_eq',$equipo->estado_eq,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr>     
               <tr><td>  {{Form::label('5', 'Numero en la of.')}}</td><td> {{Form::text('numero_por_of', $equipo->numero_por_of,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
               <tr><td>  {{Form::label('6', 'MAC')}}</td><td> {{Form::text('mac_eq', $equipo->mac_eq,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
               <tr><td>  {{Form::label('7', 'IP')}}</td><td> {{Form::text('ip_eq', $equipo->ip_eq,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
               <tr><td>  {{Form::label('8', 'Marca')}}</td><td> {{Form::text('marca_eq', $equipo->marca_eq,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
               <tr><td>  {{Form::label('8', 'Modelo')}}</td><td>{{Form::text('modelo_eq', $equipo->modelo_eq,array('class' => 'form-control','readonly' => 'readonly'))}} </td></tr> 
               <tr><td>  {{Form::label('9', 'Año de adquision')}}</td><td> {{Form::text('fecha_compra_eq', $equipo->fecha_compra_eq,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr>
               
            </table>
        </div>
        <div class="divsResponsive">  
                <table>
                <tr><td> {{Form::label('10', 'Procesador')}}</td><td> {{Form::text('placa',$equipo->procesador,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
                <tr><td> {{Form::label('11', 'Placa')}}</td><td> {{Form::text('placa',$equipo->placa,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
                <tr><td>  {{Form::label('12', 'RAM')}}</td><td> {{Form::text('ram', $equipo->ram,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
                <tr><td>  {{Form::label('13', 'Sistema Operativo')}}</td><td> {{Form::text('sistema_operativo',$equipo->sistema_operativo,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
                <tr><td>  {{Form::label('14', 'Monitor')}}</td><td> {{Form::text('monitor',$equipo->monitor,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
                <tr><td>  {{Form::label('15', 'Teclado')}}</td><td> {{Form::text('teclado',$equipo->teclado,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
                <tr><td>  {{Form::label('16', 'Lectora')}}</td><td> {{Form::text('lectora',$equipo->lectora,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
                <tr><td>  {{Form::label('17', 'Parlantes')}}</td><td> {{Form::text('parlantes',$equipo->parlantes,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
                <tr><td>  {{Form::label('18', 'Estabilizador')}}</td><td> {{Form::text('estabilizador',$equipo->estabilizador,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
                <tr><td>  {{Form::label('19', 'Otros')}}</td><td> {{Form::text('otros',$equipo->otros,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr>          
                </table>
        </div >
        <div class="divsResponsive">
                <h1>Progamas instalados</h1>
                 @foreach($programa as $programa) 
                 {{$programa->id_programa}}     
                 {{ $programa->nombre_prog}}    <br>

            @endforeach
        </div>
                
           
      </div>           
                              
      <tr><td> 
              {{ Form::close() }} </td><td></td></tr>
    
  </table>              
</div>      

@stop