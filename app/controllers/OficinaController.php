<?php
 use Doctrine\Common\Cache\CacheProvider as DoctrineCache;
class OficinaController extends BaseController {
 
    public function mostrarOficina()
    {
        $oficina = Oficina::paginate(9);        
        return View::make('OficinaMenu', array('oficina' => $oficina));      
    }
   public function buscarOficina($valor)
    {       
        if($valor=="vacio"){
            $oficina = Oficina::paginate(9);       
           return View::make('OficinaMenu', array('oficina' => $oficina));   
        }
        
        else{
            $query = DB::select("SELECT * FROM t_oficina WHERE id_oficina LIKE '%".$valor."%' || nombre_oficina LIKE '%".$valor."%' "
                    . "|| edificio_oficina LIKE '%".$valor."%' || num_piso LIKE '%".$valor."%' || detalle_oficina LIKE '%".$valor."%'");    
            $perPage = 9;
            $currentPage = Input::get('page', 1) - 1;
            $pagedData = array_slice($query, $currentPage * $perPage, $perPage);
            $oficina = Paginator::make($pagedData, count($query), $perPage);
            //este codigo es similar al paginate(9) q usamos en los demas aqui usamos esto por q tenemos un array
            return View::make('OficinaMenu', array('oficina' => $oficina));   
        }
                 
    }
    public function crearOficinaVista()
    {
        return View::make('OficinaNuevo');
    }

    public function crearOficina()
    {
        $oficina=Input::all();               
        Oficina::create($oficina);
        return Redirect::to('menu_oficina');
    }
    public function modificarOficinaVista($id)
    {
        $oficina = Oficina::find($id);     
        return View::make('OficinaModificar', array('oficina' => $oficina));       
    }
 
 
    public function modificarOficina()
    {        
       $oficina = Oficina::find(Input::get('id_oficina')); 
       $oficina->nombre_oficina=Input::get('nombre_oficina');
       $oficina->edificio_oficina=Input::get('edificio_oficina');
       $oficina->num_piso=Input::get('num_piso');
       $oficina->detalle_oficina=Input::get('detalle_oficina');
       $oficina->save();
       
       return Redirect::to('menu_oficina');
    }
 
     public function eliminarOficina($id)
    {
        $oficina = Oficina::find($id);     
        $oficina->delete();
       
       return Redirect::to('menu_oficina');       
    }  
     public function detalleOficina($id)
    {
        $oficina = Oficina::find($id);  
        $equipo = DB::table('t_equipo')->where('id_oficina',$id)->paginate(9);  
        return View::make('OficinaDetalle', array('oficina' => $oficina,'equipo'=>$equipo));     
    }  
     public function exportarPDFOficina($valor)
    {
       $oficina = Oficina::all();    
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
                <h1> Lista de las Oficinas</h1>
                <table >
                    <thead>
                    <tr>                       
                        <th>Id </th>
                        <th>Nombre</th>
                        <th> Edificio </th> 
                        <th>Numero de Piso </th>                        
                         <th>Detalles</th>
                    </tr>
                </thead>";
       foreach ($oficina as $oficina){
           $html.="<tr><td>".$oficina->id_oficina."</td>";
           $html.="<td>".$oficina->nombre_oficina."</td>";
           $html.="<td>".$oficina->edificio_oficina."</td>";
           $html.="<td>".$oficina->num_piso."</td>";                
           $html.="<td>".$oficina->detalle_oficina."</td></tr>";           
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