@extends('formMaestro')
@section('OficinaMenu')
<div id="todoContenido">
         <h1>
             Lista de las oficinas registradas<br>
  </h1>
   <div class="opcionesMenu">
                  <table>
                      <tr>
                      <td> <a href="nuevo_oficina"><img src="img/aumentar.png"></a></td>
                      <td> <a href="exportar_pdf_oficina__exportPDF" target="_blank"><img src="img/exportPDF.png"></a></td>
                      <td> <a href="exportar_pdf_oficina__descargarPDF" ><img src="img/descargar.png"></a></td>
                      <td> <input type="hidden" value="buscar_oficina" id="dirHidden" name="dirHidden">
                      <input type="text" id="txtBuscar" name="txtBuscar">
                      <a href="javascript:buscarConsulta();"><img src="img/buscar.png"></a></td>
                      <td> {{$oficina->links()}}</td>
                      </tr>
                  </table>
                                      
              </div>
    
<div class="table-responsive" >
                <table class="table table-hover" >
              
                    <tr>                       
                        <th>
                            Id
                        </th>
                        <th >
                            Oficina
                        </th>
                        <th>
                            Direccion
                        </th> 
                        <th>
                            Piso
                        </th>                        
                         <th>
                            Detalles
                        </th>
                        <th>
                            Detalle
                        </th>
                         <th>
                            Modificar
                        </th>
                         <th>
                            Eliminar
                        </th>
                        
                    </tr>
                  <?php $num=-1?>
                    @foreach($oficina as $oficina)
  <tr>
      <td>            
           <?php $num+=1?>
           {{$oficina->id_oficina}}
      </td>
      <td>
           {{ $oficina->nombre_oficina}}
      </td>
      <td>
           {{ $oficina->edificio_oficina}}
      </td>
      
      <td>
           {{ $oficina->num_piso}}
      </td>
      <td>
           {{ $oficina->detalle_oficina}}
      </td>
       <td>
           <a href="detalle_oficina{{$oficina->id_oficina}}"><img src="img/detalle.png"></a>
      </td>
      <td>
           <a href="modificar_oficina{{$oficina->id_oficina}}"><img src="img/editar.png"></a>
      </td>
      <td>
           <a href="eliminar_oficina{{$oficina->id_oficina}}"><img src="img/eliminar.png"></a>
      </td>
      
      
      
  </tr>
     @endforeach
                    
                    
            </table>
            </div>    
</div>

   
@stop