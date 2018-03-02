@extends('formMaestro')
@section('UsuarioMenu')
<div id="todoContenido">
         <h1>
              Menu de Usuarios  <br>



<div class="table-responsive" >
                <table class="table table-hover" >    
                    <tr>                       
                        <th>
                            Id
                        </th>
                        <th >
                            Usuario
                        </th>
                        <th>
                            Tipo
                        </th>                                                
                         <th>
                            Apellidos
                        </th>
                         <th>
                            Nombres
                        </th>
                        <th>
                            DNI
                        </th>
                        <th>
                            Cargo
                        </th>
                        <th>
                            Edad
                        </th>
                        <th>
                            Sexo
                        </th>
                        <th>
                            FN
                        </th>
                        <th>
                            Direccion
                        </th>
                        <th>
                            Telefono
                        </th>
                        <th>
                            Registro
                        </th>
                        <th>
                            Dar baja
                        </th>
                    </tr>
                  <?php $num=-1?>
                    @foreach($usuario as $usuario)
  <tr>
      <td>            
           <?php $num+=1?>
           {{$usuario->id_user}}
      </td>
      <td>
           {{ $usuario->user_log}}
      </td>
      <td>
           {{ $usuario->tipo_user}}
      </td>
      <td>
           {{ $usuario->apellido_user}}
      </td>
      <td>
           {{ $usuario->nombre_user}}
      </td>
      <td>
           {{ $usuario->dni_user}}
      </td>
      <td>
           {{ $usuario->cargo_user}}
      </td>
      <td>
           {{ $usuario->edad_user}}
      </td>
      <td>
           {{ $usuario->sexo_user}}
      </td>
       <td>
           {{ $usuario->fecha_nac_user}}
      </td>
       <td>
           {{ $usuario->direccion_user}}
      </td>
       <td>
           {{ $usuario->telefono_user}}
      </td>
       <td>
           {{ $usuario->fecha_reg_user}}
      </td>
      
      
      
      <td>
          <?--
           <a href="eliminar_usuario{{$usuario->id_usuario}}">Eliminar</a>
           ?>
      </td>
      
      
      
  </tr>
     @endforeach
                    
                    
            </table>
            </div>
             
    
</div>

   
@stop