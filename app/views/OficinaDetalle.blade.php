@extends('formMaestro')
@section('OficinaDetalle')               
<div id="todoContenido">
         <h1>
             Detalle Oficina 
             {{$oficina->id_oficina}}
             <br></h1>
    <div class="divsResponsive">
        <h4>Detalles</h4>      
      <table>
       {{ Form::open(array('url' => 'modificando_oficina')) }}
       {{Form::hidden('id_oficina',$oficina->id_oficina )}}
      <tr><td> {{Form::label('1', 'Nombre Oficina')}}</td><td>{{Form::text('nombre_oficina', $oficina->nombre_oficina,array('required','class' => 'form-control','readonly' => 'readonly'))}}</td></tr>
      <tr><td>  {{Form::label('2', 'Dirección Oficina')}}</td><td>{{Form::text('edificio_oficina', $oficina->edificio_oficina,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr>
      <tr><td>  {{Form::label('3', 'Numero de piso')}}</td><td> {{Form::text('num_piso', $oficina->num_piso,array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','readonly' => 'readonly'))}}</td></tr>  
      <tr><td>  {{Form::label('4', 'Detalle oficina')}}</td><td> {{Form::text('detalle_oficina', $oficina->detalle_oficina,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr> 
      <tr><td> </td><td></td></tr>
      <tr><td> </td><td></td></tr>
      <tr><td> 
       {{ Form::close() }} </td><td></td></tr>      
  </table>  
    </div>
    <div class="divsResponsive">
        <h4>Equipos en esta oficina  {{$equipo->links()}}</h4>
       
        <div class="table-responsive" >
     
                <table class="table table-hover" >
                    
                    <thead>
                     
                    <tr>                       
                        <th>
                            Id
                        </th>
                        <th >
                            Id Encargado
                        </th>
                        <th>
                            Id Oficina
                        </th> 
                        <th>
                           Tipo
                        </th>                       
                         <th>
                            Estado
                        </th>
                        <th>
                            Orden of
                        </th>
                        <th>
                            MAC
                        </th>
                        <th>
                          IP
                        </th>
                        <th>
                            Marca 
                        </th>
                        <th>
                            Modelo 
                        </th>
                        <th>
                            Año  
                        </th>
                    </tr>
                    </thead>
                  <?php $num=-1?>
                    @foreach($equipo as $equipo)
  <tr>
      <td>            
           <?php $num+=1?>
           {{$equipo->id_eq}}
      </td>
      <td>
           {{ $equipo->id_encargado}}
      </td>
      <td>
           {{ $equipo->id_oficina}}
      </td>
      <td>
           {{ $equipo->tipo_eq}}
      </td>
      <td>
           {{ $equipo->estado_eq}}
      </td>
      <td>
           {{ $equipo->numero_por_of}}
      </td>
      <td>
           {{ $equipo->mac_eq}}
      </td>
      <td>
           {{ $equipo->ip_eq}}
      </td>
       <td>
           {{ $equipo->marca_eq}}
      </td>
       <td>
           {{ $equipo->modelo_eq}}
      </td>
      <td>
           {{ $equipo->fecha_compra_eq}}
      </td>   
  </tr>
     @endforeach  
            </table>
    </div>
    </div>
    
             
    
</div>

@stop