@extends('formMaestro')
@section('ProgramaModificar')
<div id="todoContenido">
         <h1>
             Modificar Programa 
             {{$programa->id_programa}}
             <br></h1>
   <table>
       {{ Form::open(array('url' => 'modificando_programa')) }}
       {{Form::hidden('id_programa',$programa->id_programa )}}
      <tr><td> {{Form::label('1', 'Nombre Programa')}}</td><td>{{Form::text('nombre_prog', $programa->nombre_prog,array('class' => 'form-control', 'required'))}}</td></tr>
      <tr><td>  {{Form::label('2', 'Versión Programa')}}</td><td>{{Form::text('version_prog', $programa->version_prog,array('class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('3', 'Año de Creación')}}</td><td> {{Form::text('fecha_creacion_prog', $programa->fecha_creacion_prog,array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'4'))}}</td></tr>      
      <tr><td> </td><td></td></tr>
      <tr><td> </td><td></td></tr>
      <tr><td> {{Form::submit('Modificar',array('class' => 'btn btn-success'))}}
       {{ Form::close() }} </td><td></td></tr>
      
  </table>
</div>

   
@stop