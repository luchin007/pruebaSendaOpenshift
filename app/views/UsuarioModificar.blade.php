@extends('formMaestro')
@section('UsuarioModificar')
<div id="todoContenido">
         <h1>
             Modificar Usuario 
             {{Auth::user()->id_user}}
         <br></h1>
    Cuenta creada desde: {{Auth::user()->fecha_reg_user}}<br>
    Nombre de Usuario: <h3>{{Auth::user()->usuario}} </h3>
  <table>
       {{ Form::open(array('url' => 'modificando_usuario')) }}
       {{Form::hidden('id_user',Auth::user()->id_user)}}
      <tr><td>  {{Form::label('3', 'Tipo de Usuario')}}</td><td> {{Form::select('tipo_user', array('Usuario'=>'Usuario','Visitante'=>'Visitante','Administrador'=>'Administrador'),Auth::user()->tipo_user,array('class' => 'form-control'))}}</td></tr>     
      <tr><td>  {{Form::label('4', 'Nombre ')}}</td><td> {{Form::text('nombre_user', Auth::user()->nombre_user,array('class' => 'form-control'))}}</td></tr>    
      <tr><td>  {{Form::label('5', 'Apellido ')}}</td><td> {{Form::text('apellido_user', Auth::user()->apellido_user,array('class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('5', 'DNI ')}}</td><td> {{Form::text('dni_user', Auth::user()->dni_user,array('class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('5', 'Sexo ')}}</td><td>  {{Form::select('sexo_user', array('Masculino'=>'Masculino','Femenino'=>'Femenino'),Auth::user()->sexo_user,array('class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('5', 'Fecha de Nacimiento ')}}</td><td> <input type="date" class="form-control" name="fecha_nac_user" step="1"  value="{{Auth::user()->fecha_nac_user}}"></td></tr>
      <tr><td>  {{Form::label('5', 'Direccion ')}}</td><td> {{Form::text('direccion_user', Auth::user()->direccion_user,array('class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('6', 'Teléfono ')}}</td><td> {{Form::text('telefono_user', Auth::user()->telefono_user,array('class' => 'form-control', 'onkeypress' => 'return validarNumeros(event)','maxlength'=>'10'))}}</td></tr>          
      <tr><td>  {{Form::label('7', 'Correo ')}}</td><td> {{Form::email('correo_user', Auth::user()->correo_user,array('class' => 'form-control'))}}</td></tr>
      <tr><td>  {{Form::label('9', 'Cargo ')}}</td><td> {{Form::text('cargo_user', Auth::user()->cargo_user,array('class' => 'form-control'))}}</td></tr>
      <tr><td> </td><td></td></tr>
      <tr><td> </td><td></td></tr>
      <tr><td> {{Form::submit('Modificar',array('class' => 'btn btn-success'))}}
       {{ Form::close() }} </td><td></td></tr>
      
  </table>
             
    
</div>

   
@stop