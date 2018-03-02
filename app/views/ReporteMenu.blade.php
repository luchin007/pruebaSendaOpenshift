@extends('formMaestro')
@section('ReporteMenu')
<script type="text/javascript">          
            function mostrarEquipoEstado(){
                var estado=document.getElementsByName("estado_eq")[0].value;
               location.href = "mostrar_equipos_estado"+estado;
            }
            function mostrarEquipoTipo(){
                var estado=document.getElementsByName("tipo_eq")[0].value;
               location.href = "mostrar_equipos_tipo"+estado;
            }
             function mostrarEquipoFecha(){
                var estado=document.getElementsByName("ordenar")[0].value;
               location.href = "mostrar_equipos_fecha"+estado;
            }
            function abrirVentana(){                
                document.getElementById("ventanaModal").style.display="block";
            }
            
</script> 
<div id="todoContenido">
         <h1>
             Zona de Consultas  <br></h1>
              <br>    
              <div id="divEquipo" class="contenidoConsulta">
                 <div class="subcontenidoConsulta">   
                    <table class="table table-hover">
                      <tr><thead><td colspan="2"><h4>Datos estadisticos</h4></td></thead></tr>
                      <tr><td>Cantidad de equipos</td> <td> {{DB::select("SELECT count(id_eq) as cant FROM t_equipo ")[0]->cant;}}</td></tr>
                      <tr><td>Cantidad de encargados</td> <td> {{DB::select("SELECT count(id_enc) as cant FROM t_encargado")[0]->cant;}}</td></tr>
                      <tr><td>Cantidad de oficinas</td> <td> {{DB::select("SELECT count(id_oficina) as cant FROM t_oficina")[0]->cant;}}</td></tr>
                     
                      
                      <tr><td>Cuantos equipos en estado Muy Bueno</td> <td>{{DB::select("SELECT count(id_eq) as cant FROM t_equipo where estado_eq='Muy Bueno'")[0]->cant;}}</td></tr>
                      <tr><td>Cuantos equipos en estado Bueno</td> <td>{{DB::select("SELECT count(id_eq) as cant FROM t_equipo where estado_eq='Bueno'")[0]->cant;}}</td></tr>
                      <tr><td>Cuantos equipos en estado Regular</td> <td>{{DB::select("SELECT count(id_eq) as cant FROM t_equipo where estado_eq='Regular'")[0]->cant;}}</td></tr>
                      <tr><td>Cuantos equipos en estado Malo</td> <td>{{DB::select("SELECT count(id_eq) as cant FROM t_equipo where estado_eq='Malo'")[0]->cant;}}</td></tr>
                      <tr><td>Cuantos equipos en estado Muy Malo</td> <td>{{DB::select("SELECT count(id_eq) as cant FROM t_equipo where estado_eq='Muy Malo'")[0]->cant;}}</td></tr>
                      <tr><td>Cuantas son computadoras</td> <td>{{DB::select("SELECT count(id_eq) as cant FROM t_equipo where tipo_eq='Computadora'")[0]->cant;}}</td></tr>
                      <tr><td>Cuantas no son computadoras</td> <td>{{DB::select("SELECT count(id_eq) as cant FROM t_equipo where tipo_eq<>'Computadora'")[0]->cant;}}</td></tr>
                   </table>
                   </div>
                  <div  class="subcontenidoConsulta">
                     
                      <table class="table table-hover">
                      <tr><thead><td colspan="3"><h4> Equipos segun Encargado</h4></td></thead></tr>                     
                      <?php $query=DB::select("SELECT id_encargado, COUNT(id_encargado) as cantidad FROM t_equipo group by id_encargado");
                        foreach($query as $encargado){
                            echo "<tr><td>".$encargado->id_encargado."</td><td>".$encargado->cantidad."</td><td><a href='detalle_encargado".$encargado->id_encargado."'>Ver </a></td></tr>";
                        }
                      ?>
                      </table>
                       <table class="table table-hover">
                      <tr><thead><td colspan="3"><h4> Equipos segun Oficina</h4></td></thead></tr>                     
                      <?php $query=DB::select("SELECT id_oficina, COUNT(id_oficina) as cantidad FROM t_equipo group by id_oficina");
                        foreach($query as $oficina){
                            echo "<tr><td>".$oficina->id_oficina."</td><td>".$oficina->cantidad."</td><td><a href='detalle_oficina".$oficina->id_oficina."'> Ver</a></td></tr>";
                        }
                      ?>
                      </table>
                      
                  </div>
                   <div  class="subcontenidoConsulta">
                     Mostrar los equipos segun el estado
                      {{Form::select('estado_eq',  array('Muy Bueno'=>'Muy Bueno','Bueno'=>"Bueno",'Regular'=>"Regular",'Malor'=>"Malo",'Muy Malo'=>"Muy Malo"))}}
                      <a href="javascript:mostrarEquipoEstado();"  class="btnRef">Mostrar</a>
                      <br><br>
                      Mostrar los equipos segun su tipo
                      {{Form::select('tipo_eq', array('Computadora'=>'Computadora','Acces Point'=>'Acces Point','Servidor'=>'Servidor','Router'=>'Router','Modem'=>'Modem','Telefono'=>'Telefono','Impresora'=>'Impresora'))}}
                      <a href="javascript:mostrarEquipoTipo();"  class="btnRef">Mostrar</a>
                      <br><br>
                      Ordenar segun fecha de compra
                      {{Form::select('ordenar', array('asc'=>'Ascendente','Acces desc'=>'Descendente'))}}
                      <a href="javascript:mostrarEquipoFecha();"  class="btnRef">Mostrar</a>
                     <br><br>
                  </div>
                 
              </div>
              
                         
             
             
    
</div>

   
@stop