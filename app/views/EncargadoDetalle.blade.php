@extends('formMaestro')
@section('EncargadoDetalle')               
<div id="todoContenido">
         <h1>
             Detalle Encargado 
             {{$encargado->id_enc}}
             <br></h1>
    <div class="divsResponsive">
        <h4>Detalles</h4>
       <table>           
       {{ Form::open(array('url' => 'modificando_encargado')) }}
       {{Form::hidden('id_enc',$encargado->id_enc)}}
      <tr><td>  {{Form::label('1', 'Nombre del encargado')}}</td><td>{{Form::text('nombre_enc', $encargado->nombre_enc,array('required','class' => 'form-control','readonly' => 'readonly'))}}</td></tr>
      <tr><td>  {{Form::label('2', 'Apellido del encargado')}}</td><td>{{Form::text('apellido_enc', $encargado->apellido_enc,array('required','class' => 'form-control','readonly' => 'readonly'))}}</td></tr>      
      <tr><td>  {{Form::label('3', 'Sexo')}}</td><td> {{Form::select('sexo_enc', array('M'=>'Masculino','F'=>'Femenino'),$encargado->sexo_enc,array('class' => 'form-control','disabled' => 'true'))}}</td></tr>     
      <tr><td>  {{Form::label('4', 'Edad ')}}</td><td> {{Form::text('edad_enc', $encargado->edad_enc,array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'3','readonly' => 'readonly'))}}</td></tr>    
      <tr><td>  {{Form::label('5', 'DNI ')}}</td><td> {{Form::text('dni_enc', $encargado->dni_enc,array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'8','readonly' => 'readonly'))}}</td></tr>
      <tr><td>  {{Form::label('6', 'Teléfono ')}}</td><td> {{Form::text('telefono_enc', $encargado->telefono_enc,array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'10','readonly' => 'readonly'))}}</td></tr>          
      <tr><td>  {{Form::label('7', 'Cargo ')}}</td><td> {{Form::text('cargo_enc', $encargado->cargo_enc,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr>
      <tr><td>  {{Form::label('8', 'Contrata ')}}</td><td> {{Form::text('tipo_contrata_enc', $encargado->tipo_contrata_enc,array('class' => 'form-control','readonly' => 'readonly'))}}</td></tr>
      <tr><td> </td><td></td></tr>
      <tr><td> </td><td></td></tr>
       {{ Form::close() }} </td><td></td></tr>
      
  </table>
    </div>
    <div class="divsResponsive">
        <h4>Computadoras a cargo  {{$equipo->links()}}</h4>
       
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