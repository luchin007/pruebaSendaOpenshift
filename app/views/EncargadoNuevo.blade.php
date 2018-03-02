@extends('formMaestro')
@section('EncargadoNuevo')
<div id="todoContenido">
         <h1>
             Insertar un nuevo encargado <br> para los equipos <br></h1>
   <table>
       {{ Form::open(array('url' => 'insertar_encargado')) }}
      <tr><td>  {{Form::label('1', 'Nombre del encargado')}}</td><td>{{Form::text('nombre_enc', '',array('required','class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('2', 'Apellido del encargado')}}</td><td>{{Form::text('apellido_enc', '',array('required','class' => 'form-control'))}}</td></tr>      
      <tr><td>  {{Form::label('3', 'Sexo')}}</td><td> {{Form::select('sexo_enc',  array('M'=>'Masculino','F'=>'Femenino'))}}</td></tr>     
      <tr><td>  {{Form::label('4', 'Edad ')}}</td><td> {{Form::text('edad_enc', '',array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'3'))}}</td></tr>    
      <tr><td>  {{Form::label('5', 'DNI ')}}</td><td> {{Form::text('dni_enc', '',array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'8'))}}</td></tr>
      <tr><td>  {{Form::label('6', 'Teléfono ')}}</td><td> {{Form::text('telefono_enc', '',array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'10'))}}</td></tr>          
      <tr><td>  {{Form::label('7', 'Cargo ')}}</td><td> {{Form::text('cargo_enc', '',array('class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('8', 'Contrata ')}}</td><td> {{Form::text('tipo_contrata_enc', '',array('class' => 'form-control'))}}</td></tr>    
      <tr><td> </td><td></td></tr>
      <tr><td> </td><td></td></tr>
      <tr><td> {{Form::submit('Guardar',array('class' => 'btn btn-success'))}}              
       {{ Form::close() }} </td><td></td></tr>
      
  </table>

</div>

   
@stop