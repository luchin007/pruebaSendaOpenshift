@extends('formMaestro')
@section('ProgramaMenu')
<div id="todoContenido">
         <h1>
              Menu de Softwares  <br>
             <div class="opcionesMenu">
                  <table>
                      <tr>
                      <td> <a href="nuevo_programa"><img src="img/aumentar.png"></a></td>
                      <td> <a href="exportar_pdf_programa__exportPDF" target="_blank"><img src="img/exportPDF.png"></a></td>
                      <td> <a href="exportar_pdf_programa__descargarPDF" ><img src="img/descargar.png"></a></td>
                      
                      <td> <input type="hidden" value="buscar_programa" id="dirHidden" name="dirHidden">
                    <input type="text" id="txtBuscar" name="txtBuscar">
                    <a href="javascript:buscarConsulta();"><img src="img/buscar.png"></a>                    
                      <td> {{$programa->links()}}</td>
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
                            Nombre
                        </th>
                        <th>
                            Version
                        </th> 
                        <th>
                           Fecha Creacion
                        </th>                       
                         <th>
                            Modificar
                        </th>
                         <th>
                            Eliminar
                        </th>
                        
                    </tr>
                  <?php $num=-1?>
                    @foreach($programa as $programa)
  <tr>
      <td>            
           <?php $num+=1?>
           {{$programa->id_programa}}
      </td>
      <td>
           {{ $programa->nombre_prog}}
      </td>
      <td>
           {{ $programa->version_prog}}
      </td>
      <td>
           {{ $programa->fecha_creacion_prog}}
      </td>
      
      <td>
          <a href="modificar_programa{{$programa->id_programa}}"><img src="img/editar.png"></a>
      </td>
      <td>
           <a href="eliminar_programa{{$programa->id_programa}}"><img src="img/eliminar.png"></a>
      </td>
      
      
      
  </tr>
     @endforeach
                    
                    
            </table>
            </div>
    
</div>

   
@stop