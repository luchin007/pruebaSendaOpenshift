@extends('formMaestro')
@section('OficinaNuevo')
<div id="todoContenido">
         <h1>
             Insertar una nueva Oficina  <br></h1>
   <table>
       {{ Form::open(array('url' => 'insertar_oficina')) }}
      <tr><td> {{Form::label('1', 'Nombre de la Oficina')}}</td><td>{{Form::text('nombre_oficina', '',array('required','class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('2', 'Eficio que pertenece')}}</td><td>{{Form::text('edificio_oficina', '',array('class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('3', 'Numero de piso')}}</td><td> {{Form::text('num_piso', '',array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)'))}}</td></tr>     
      <tr><td>  {{Form::label('4', 'Detalle Oficina')}}</td><td> {{Form::text('detalle_oficina', '',array('class' => 'form-control'))}}</td></tr>      
      <tr><td> </td><td></td></tr>
      <tr><td> </td><td></td></tr>
      <tr><td> {{Form::submit('Guardar',array('class' => 'btn btn-success'))}}
       {{ Form::close() }} </td><td></td></tr>
      
  </table>
    
</div>

   
@stop