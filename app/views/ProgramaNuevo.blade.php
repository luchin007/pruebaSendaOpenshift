@extends('formMaestro')
@section('ProgramaNuevo')

<div id="todoContenido">
         <h1>
             Insertar un nuevo Programa  <br></h1>
   <table>
       {{ Form::open(array('url' => 'insertar_programa')) }}
      <tr><td> {{Form::label('1', 'Nombre Programa')}}</td><td>{{Form::text('nombre_prog', '',array('class' => 'form-control', 'required'))}}</td></tr>
      <tr><td>  {{Form::label('2', 'Versión Programa')}}</td><td>{{Form::text('version_prog', '',array('class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('3', 'Año de Creación')}}</td><td> {{Form::text('fecha_creacion_prog', '',array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'4'))}}</td></tr>  
      <tr><td> </td><td></td></tr>
      <tr><td> </td><td></td></tr>
      <tr><td> {{Form::submit('Guardar',array('class' => 'btn btn-success'))}}
       {{ Form::close() }} </td><td></td></tr>
      
  </table>
    
</div>

   
@stop