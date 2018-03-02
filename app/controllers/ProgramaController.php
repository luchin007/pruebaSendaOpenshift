<?php
 use Doctrine\Common\Cache\CacheProvider as DoctrineCache;
 use Illuminate\Support\Facades\DB AS DB;
class ProgramaController extends BaseController {
 
    public function mostrarPrograma()
    {
        $programa = Programa::paginate(9);        
        return View::make('ProgramaMenu', array('programa' => $programa));      
    }
    
   public function buscarPrograma($valor)
    {       
        if($valor=="vacio"){
            $programa = Programa::paginate(9);       
           return View::make('ProgramaMenu', array('programa' => $programa));   
        }
        else{
            $query = DB::select("SELECT * FROM t_programas WHERE id_programa LIKE '%".$valor."%' || nombre_prog LIKE '%".$valor."%' "
                    . "|| version_prog LIKE '%".$valor."%' || fecha_creacion_prog LIKE '%".$valor."%' "); 
            $perPage = 9;
            $currentPage = Input::get('page', 1) - 1;
            $pagedData = array_slice($query, $currentPage * $perPage, $perPage);
            $programa = Paginator::make($pagedData, count($query), $perPage);
            //este codigo es similar al paginate(9) q usamos en los demas aqui usamos esto por q tenemos un array
            
           return View::make('ProgramaMenu', array('programa' => $programa));   
        }
                 
    }
    
    public function crearProgramaVista()
    {
        return View::make('ProgramaNuevo');
    }

    public function crearPrograma()
    {
        $programa=Input::all();               
        Programa::create($programa);
        return Redirect::to('menu_programa');
    }
    public function modificarProgramaVista($id)
    {
        $programa = Programa::find($id);     
        return View::make('ProgramaModificar', array('programa' => $programa));       
    }
 
 
    public function modificarPrograma()
    {        
       $programa = Programa::find(Input::get('id_programa')); 
       $programa->nombre_prog=Input::get('nombre_prog');
       $programa->version_prog=Input::get('version_prog');
       $programa->fecha_creacion_prog=Input::get('fecha_creacion_prog');       
       $programa->save();
       
       return Redirect::to('menu_programa');
    }
 
     public function eliminarPrograma($id)
    {
        $programa = Programa::find($id);     
        $programa->delete();
       
       return Redirect::to('menu_programa');       
    }   
    
     public function exportarPDFPrograma($valor)
    {
       $programa = Programa::all();    
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
                <h1> Lista de los Programas</h1>
                <table >
                    <thead>
                    <tr>                       
                        <th>Id </th>
                        <th>Nombre</th>
                        <th> Version del Programa</th> 
                        <th>Fecah de creacion </th>   
                    </tr>
                </thead>";
       foreach ($programa as $programa){
           $html.="<tr><td>".$programa->id_programa."</td>";
           $html.="<td>".$programa->nombre_prog."</td>";
           $html.="<td>".$programa->version_prog."</td>";        
           $html.="<td>".$programa->fecha_creacion_prog."</td></tr>";           
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