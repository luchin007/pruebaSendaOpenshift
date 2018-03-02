@extends('formMaestro')
@section('EncargadoMenu')

<div id="todoContenido">
         <h1>
              Lista de todos las encargados de los equipos<br>
         </h1>
    <div class="opcionesMenu">
                  <table >
                      <tr>
                      <td> <a href="nuevo_encargado"><img src="img/aumentar.png"></a></td>
                      <td> <a href="exportar_pdf_encargado__exportPDF" target="_blank"><img src="img/exportPDF.png"></a></td>
                      <td> <a href="exportar_pdf_encargado__descargarPDF" ><img src="img/descargar.png"></a></td>
                      <td> <input type="hidden" value="buscar_encargado" id="dirHidden" name="dirHidden">
                      <input type="text" id="txtBuscar" name="txtBuscar">
                      <a href="javascript:buscarConsulta();"><img src="img/buscar.png"></a></td>
                      <td> {{$encargado->links()}}</td>
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
                        <th>
                            Nombre
                        </th>
                        <th>
                            Apellido
                        </th> 
                        <th>
                            Sexo
                        </th>                        
                         <th>
                            Edad
                        </th>
                        <th>
                            DNI
                        </th>
                        <th>
                            Teléfono
                        </th>
                        <th>
                            Cargo
                        </th>
                        <th>
                            Contrata
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
                    @foreach($encargado as $enc)
  <tr>
      <td>            
           <?php $num+=1?>
           {{$enc->id_enc}}
      </td>
      <td>
           {{ $enc->nombre_enc}}
      </td>
      <td>
           {{ $enc->apellido_enc}}
      </td>
      <td>
           {{ $enc->sexo_enc}}
      </td>
      <td>
           {{ $enc->edad_enc}}
      </td>
      <td>
           {{ $enc->dni_enc}}
      </td>
      <td>
           {{ $enc->telefono_enc}}
      </td>   
      <td>
           {{ $enc->cargo_enc}}
      </td>
      <td>
           {{ $enc->tipo_contrata_enc}}
      </td>
      <td>
          <a href="detalle_encargado{{$enc->id_enc}}"> <img src="img/detalle.png"> </a>
      </td>
      <td>
          <a href="modificar_encargado{{$enc->id_enc}}"> <img src="img/editar.png"> </a>
      </td>
      <td>
           <a href="eliminar_encargado{{$enc->id_enc}}"><img src="img/eliminar.png"></a>
      </td>
          
     
  </tr>
  
     @endforeach
            </table>
     
            </div>
</div>

   
@stop