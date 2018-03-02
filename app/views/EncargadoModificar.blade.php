@extends('formMaestro')
@section('EncargadoModificar')
<div id="todoContenido">
         <h1>
             Modificar Encargado 
             {{$encargado->id_enc}}
             <br></h1>
  <table>
       {{ Form::open(array('url' => 'modificando_encargado')) }}
       {{Form::hidden('id_enc',$encargado->id_enc)}}
      <tr><td>  {{Form::label('1', 'Nombre del encargado')}}</td><td>{{Form::text('nombre_enc', $encargado->nombre_enc,array('required','class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('2', 'Apellido del encargado')}}</td><td>{{Form::text('apellido_enc', $encargado->apellido_enc,array('required','class' => 'form-control'))}}</td></tr>      
      <tr><td>  {{Form::label('3', 'Sexo')}}</td><td> {{Form::select('sexo_enc', array('M'=>'Masculino','F'=>'Femenino'),$encargado->sexo_enc,array('class' => 'form-control'))}}</td></tr>     
      <tr><td>  {{Form::label('4', 'Edad ')}}</td><td> {{Form::text('edad_enc', $encargado->edad_enc,array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'3'))}}</td></tr>    
      <tr><td>  {{Form::label('5', 'DNI ')}}</td><td> {{Form::text('dni_enc', $encargado->dni_enc,array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'8'))}}</td></tr>
      <tr><td>  {{Form::label('6', 'Teléfono ')}}</td><td> {{Form::text('telefono_enc', $encargado->telefono_enc,array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'10'))}}</td></tr>          
      <tr><td>  {{Form::label('7', 'Cargo ')}}</td><td> {{Form::text('cargo_enc', $encargado->cargo_enc,array('class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('8', 'Contrata ')}}</td><td> {{Form::text('tipo_contrata_enc', $encargado->tipo_contrata_enc,array('class' => 'form-control'))}}</td></tr>
      <tr><td> </td><td></td></tr>
      <tr><td> </td><td></td></tr>
      <tr><td> {{Form::submit('Modificar',array('class' => 'btn btn-success'))}}
       {{ Form::close() }} </td><td></td></tr>
      
  </table>
             
    
</div>

   
@stop