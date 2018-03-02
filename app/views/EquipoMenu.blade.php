@extends('formMaestro')
@section('EquipoMenu')
<div id="todoContenido">
         <h1>
              Menu de Softwares  <br>
              <div class="opcionesMenu">
                  <table>
                      <tr>
                      <td> <a href="nuevo_equipo"><img src="img/aumentar.png"></a></td>
                      <td> <a href="exportar_pdf_equipo__exportPDF" target="_blank"><img src="img/exportPDF.png"></a></td>
                      <td> <a href="exportar_pdf_equipo__descargarPDF" ><img src="img/descargar.png"></a></td>
                      <td> <input type="hidden" value="buscar_equipo" id="dirHidden" name="dirHidden">
                      <input type="text" id="txtBuscar" name="txtBuscar">
                      <a href="javascript:buscarConsulta();"><img src="img/buscar.png"></a></td>
                      <td> {{$equipo->links()}}</td>
                      </tr>
                  </table>
                                      
              </div>
   
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
                         <th>
                            Detalles  
                        </th>
                        
                         <th>
                            Modificar  
                        </th>
                         <th>
                            Eliminar  
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
      <td>
        <a href="detalle_equipo{{$equipo->id_eq}}"> <img src="img/detalle.png"> </a>
      </td>
      
      <td>
          <a href="modificar_equipo{{$equipo->id_eq}}"><img src="img/editar.png"></a>
      </td>
      <td>
           <a href="eliminar_equipo{{$equipo->id_eq}}"><img src="img/eliminar.png"></a>
      </td>
      
      
      
  </tr>
     @endforeach
                    
                    
            </table>
            </div>
             
    
</div>

   
@stop