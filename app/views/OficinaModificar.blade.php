@extends('formMaestro')
@section('OficinaModificar')
<div id="todoContenido">
         <h1>
             Modificar Oficina 
             {{$oficina->id_oficina}}
             <br></h1>
   <table>
       {{ Form::open(array('url' => 'modificando_oficina')) }}
       {{Form::hidden('id_oficina',$oficina->id_oficina )}}
      <tr><td> {{Form::label('1', 'Nombre Oficina')}}</td><td>{{Form::text('nombre_oficina', $oficina->nombre_oficina,array('required','class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('2', 'Dirección Oficina')}}</td><td>{{Form::text('edificio_oficina', $oficina->edificio_oficina,array('class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('3', 'Numero de piso')}}</td><td> {{Form::text('num_piso', $oficina->num_piso,array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)'))}}</td></tr>  
      <tr><td>  {{Form::label('4', 'Detalle oficina')}}</td><td> {{Form::text('detalle_oficina', $oficina->detalle_oficina,array('class' => 'form-control'))}}</td></tr> 
      <tr><td> </td><td></td></tr>
      <tr><td> </td><td></td></tr>
      <tr><td> {{Form::submit('Modificar',array('class' => 'btn btn-success'))}}
       {{ Form::close() }} </td><td></td></tr>
      
  </table>   
    
</div>

   
@stop