<?php
 use Doctrine\Common\Cache\CacheProvider as DoctrineCache;
 use Illuminate\Pagination ;

class EquipoController extends BaseController {
 
    public function mostrarEquipo()
    {
        $equipo = Equipo::paginate(9);        
        return View::make('EquipoMenu', array('equipo' => $equipo));      
    }
     public function mostrarEquipoEstado($valor)
    {
        $equipo = DB::table('t_equipo')->where('estado_eq',$valor)->paginate(9);        
        return View::make('EquipoMenu', array('equipo' => $equipo));      
    }
     public function mostrarEquipoTipo($valor)
    {
        $equipo = DB::table('t_equipo')->where('tipo_eq',$valor)->paginate(9);        
        return View::make('EquipoMenu', array('equipo' => $equipo));      
    }
    
    public function mostrarEquipoFecha($valor)
    {
        $equipo = DB::table('t_equipo')->orderBy('fecha_compra_eq', $valor)->paginate(9);        
        return View::make('EquipoMenu', array('equipo' => $equipo));      
    }
    public function buscarEquipo($valor)
    {       
        if($valor=="vacio"){
            $equipo = Equipo::paginate(9);       
           return View::make('EquipoMenu', array('equipo' => $equipo));   
        }
        else{
            
           
            $query = DB::select("SELECT * FROM t_equipo WHERE id_eq LIKE '%".$valor."%' || id_encargado LIKE '%".$valor."%' || id_oficina LIKE '%".$valor."%'"
                    . "|| tipo_eq LIKE '%".$valor."%' || estado_eq LIKE '%".$valor."%' || numero_por_of LIKE '%".$valor."%' || mac_eq LIKE '%".$valor."%'"
                    . "|| ip_eq LIKE '%".$valor."%' || marca_eq LIKE '%".$valor."%' || modelo_eq LIKE '%".$valor."%' || fecha_compra_eq LIKE '%".$valor."%'"
                    . "|| procesador LIKE '%".$valor."%' || placa LIKE '%".$valor."%' || ram LIKE '%".$valor."%' || sistema_operativo LIKE '%".$valor."%'"
                    . "|| monitor LIKE '%".$valor."%' || teclado LIKE '%".$valor."%' || lectora LIKE '%".$valor."%' || parlantes LIKE '%".$valor."%'"
                    . "|| estabilizador LIKE '%".$valor."%' || otros LIKE '%".$valor."%'");   
            /* esta podia ser una forma pero enconte otra mas facil
            $equipo = DB::table('t_equipo')
                    ->where('id_encargado', 'like', '%2%')
                    ->orWhere('id_oficina', 'like', '%2%')
                    ->paginate(9);
            */
            $perPage = 9;
            $currentPage = Input::get('page', 1) - 1;
            $pagedData = array_slice($query, $currentPage * $perPage, $perPage);
            $equipo = Paginator::make($pagedData, count($query), $perPage);
            //este codigo es similar al paginate(9) q usamos en los demas aqui usamos esto por q tenemos un array
            
           return View::make('EquipoMenu', array('equipo' => $equipo));   
        }
                 
    }
    public function crearEquipoVista()
    {   
      $lista_encargado = Encargado::all();      
      $lista_oficina = Oficina::all();     
      $lista_programa=  Programa::all();
      return View::make('EquipoNuevo', array('lista_encargado' => $lista_encargado,'lista_oficina'=>$lista_oficina,'lista_programa'=>$lista_programa)); 
           
    }

    public function crearEquipo()
    {
        $equipo=Input::all();               
        Equipo::create($equipo);
        $num=Input::get('ids_programas');
        if(""+$num!="vacio"){
            $id_equipo=DB::select('SELECT max(id_eq) as id_eq FROM t_equipo');
            $id=""+$id_equipo[0]->id_eq;        
            $idsProgramas=explode("_",$num);
            $max=count($idsProgramas)-1;
            for($i=0;$i<$max;$i++){
            DB::select('INSERT INTO tr_equipo_programa VALUES ('.$id.','.$idsProgramas[$i].')');
            }  
        }
        
        
        return Redirect::to('menu_equipo');
        
    }
     public function detalleEquipoVista($id)
    {
         $lista_encargado = Encargado::all();      
         $lista_oficina = Oficina::all();   
        $equipo = Equipo::find($id);       
        $programa = DB::select("select *
                                from t_programas
                                where id_programa in (select id_programa from tr_equipo_programa where id_equipo =".$id.")");
        
        return View::make('EquipoDetalle', array('equipo' => $equipo,'programa' => $programa,'lista_encargado' => $lista_encargado,'lista_oficina'=>$lista_oficina));       
    }
    public function modificarEquipoVista($id)
    {
         $lista_encargado = Encargado::all();      
         $lista_oficina = Oficina::all();  
         $lista_programa = Programa::all(); 
         
        $equipo = Equipo::find($id);        
        $programa = DB::select("select id_programa
                                from t_programas
                                where id_programa in (select id_programa from tr_equipo_programa where id_equipo =".$id.")");
        
        return View::make('EquipoModificar', array('equipo' => $equipo,'programa' => $programa,'lista_programa' => $lista_programa,'lista_encargado' => $lista_encargado,'lista_oficina'=>$lista_oficina));       
    }
 
 
    public function modificarEquipo()
    {        
        //modificando las partes del equipo
       $id_eq=Input::get('id_eq');
       $equipo = Equipo::find($id_eq); 
       $equipo->id_encargado=Input::get('id_encargado');
       $equipo->id_oficina=Input::get('id_oficina');
       $equipo->tipo_eq=Input::get('tipo_eq');    
       $equipo->estado_eq=Input::get('estado_eq');
       $equipo->numero_por_of=Input::get('numero_por_of');
       $equipo->mac_eq=Input::get('mac_eq');
       $equipo->ip_eq=Input::get('ip_eq');
       $equipo->marca_eq=Input::get('marca_eq');
       $equipo->modelo_eq=Input::get('modelo_eq');
       $equipo->fecha_compra_eq=Input::get('fecha_compra_eq');
       $equipo->procesador=Input::get('procesador');
       $equipo->placa=Input::get('placa');
       $equipo->ram=Input::get('ram');
       $equipo->sistema_operativo=Input::get('sistema_operativo');
       $equipo->monitor=Input::get('monitor');
       $equipo->teclado=Input::get('teclado');
       $equipo->lectora=Input::get('lectora');
       $equipo->parlantes=Input::get('parlantes');
       $equipo->estabilizador=Input::get('estabilizador');
       $equipo->otros=Input::get('otros');
       $equipo->save();
        //modificando las partes de los programas instalados
       // primero elimino todos desde su id y luego inserto nuevamente
       DB::select('DELETE FROM tr_equipo_programa WHERE id_equipo='.$id_eq);
       $num=Input::get('ids_programas');
        if(""+$num!="vacio"){                 
            $idsProgramas=explode("_",$num);
            $max=count($idsProgramas)-1;
            for($i=0;$i<$max;$i++){
                DB::select('INSERT INTO tr_equipo_programa VALUES ('.$id_eq.','.$idsProgramas[$i].')');
            }  
        }
       return Redirect::to('menu_equipo');
    }
 
     public function eliminarEquipo($id)
    {
        $equipo = Equipo::find($id);     
        $equipo->delete();
       
       return Redirect::to('menu_equipo');       
    }   
    
     public function exportarPDFEquipo($valor)
    {
       $equipo = Equipo::all();    
       $html="<!DOCTYPE HTML><html lang='es-ES'> <body><div class='table-responsive' >           
           <meta http-equiv='Content-Type' content='text/html' />           
           <meta charset='utf-8' />
           <style>
                table, td, th { border: 1px solid black;
                }
                table {border-collapse: collapse;
                    width: 100%;
                }
                th {height: 50px;
                background-color: red;
                }
                td{background-color: #269abc;
                }
                h1,td{text-align:center;}
           </style>
                <h1> Lista de los Equipos</h1>
                <table >
                    <thead>
                    <tr>                       
                        <th>Id </th>
                        <th>Id-enc</th>
                        <th>Id-ofc</th> 
                        <th>tipo</th>                        
                         <th>estado</th>
                        <th>num</th>
                        <th>mac</th>
                        <th>ip</th>
                        <th>marca</th> 
                        <th>modelo</th> 
                        <th>año_compra</th> 
                    </tr>
                </thead>";
       foreach ($equipo as $equipo){
           $html.="<tr><td>".$equipo->id_eq."</td>";
           $html.="<td>".$equipo->id_encargado."</td>";
           $html.="<td>".$equipo->id_oficina."</td>";
           $html.="<td>".$equipo->tipo_eq."</td>";
           $html.="<td>".$equipo->estado_eq."</td>";
           $html.="<td>".$equipo->numero_por_of."</td>";
           $html.="<td>".$equipo->mac_eq."</td>";
           $html.="<td>".$equipo->ip_eq."</td>";
           $html.="<td>".$equipo->marca_eq."</td>";
           $html.="<td>".$equipo->modelo_eq."</td>";           
           $html.="<td>".$equipo->fecha_compra_eq."</td></tr>";           
       }
        $html.="</table></div></body></html>";
       if($valor=="__exportPDF"){
            return PDF::load($html,'A4','portrait')->show(); 
        }
        else{
            return PDF::load($html,'A4','portrait')->download('listadoPDF'); 
        }  
    } 
    
}
?>