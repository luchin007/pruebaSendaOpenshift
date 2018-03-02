<?php
 use Doctrine\Common\Cache\CacheProvider as DoctrineCache;
class EncargadoController extends BaseController {
 
    public function mostrarEncargado()
    {       
           $encargado = Encargado::paginate(9);        
           return View::make('EncargadoMenu', array('encargado' => $encargado));  
                 
    }
    public function buscarEncargado($entrada)
    {       
        if($entrada=="vacio"){
            $encargado = Encargado::paginate(9);       
           return View::make('EncargadoMenu', array('encargado' => $encargado));   
        }
        else{
            $valor=  addslashes ($entrada);//aqui codigo para evitar inyecciones sql
            $query = DB::select("SELECT * FROM t_encargado WHERE id_enc LIKE '%".$valor."%' || nombre_enc LIKE '%".$valor."%' "
                    . "|| apellido_enc LIKE '%".$valor."%' || sexo_enc LIKE '%".$valor."%' || edad_enc LIKE '%".$valor."%' "
                    . "|| dni_enc LIKE '%".$valor."%' || telefono_enc LIKE '%".$valor."%' || cargo_enc LIKE '%".$valor."%' || tipo_contrata_enc LIKE '%".$valor."%'");    
            $perPage = 9;
            $currentPage = Input::get('page', 1) - 1;
            $pagedData = array_slice($query, $currentPage * $perPage, $perPage);
            $encargado = Paginator::make($pagedData, count($query), $perPage);
            //este codigo es similar al paginate(9) q usamos en los demas aqui usamos esto por q tenemos un array
            return View::make('EncargadoMenu', array('encargado' => $encargado));   
        }
                 
    }
   
    public function crearEncargadoVista()
    {
        return View::make('EncargadoNuevo');
    }

    public function crearEncargado()
    {
        $encargado=Input::all();               
        Encargado::create($encargado);
        return Redirect::to('menu_encargado');
    }
    public function modificarEncargadoVista($id)
    {
        $encargado = Encargado::find($id);     
        return View::make('EncargadoModificar', array('encargado' => $encargado));       
    }
 
 
    public function modificarEncargado()
    {        
       $encargado = Encargado::find(Input::get('id_enc')); 
       $encargado->nombre_enc=Input::get('nombre_enc');
       $encargado->apellido_enc=Input::get('apellido_enc');
       $encargado->sexo_enc=Input::get('sexo_enc');
       $encargado->edad_enc=Input::get('edad_enc');
       $encargado->dni_enc=Input::get('dni_enc');
       $encargado->telefono_enc=Input::get('telefono_enc');
       $encargado->cargo_enc=Input::get('cargo_enc');
       $encargado->tipo_contrata_enc=Input::get('tipo_contrata_enc');
       $encargado->save();
       
       return Redirect::to('menu_encargado');
    }
 
     public function eliminarEncargado($id)
    {
        $encargado = Encargado::find($id);     
        $encargado->delete();
       
       return Redirect::to('menu_encargado');       
    } 
     public function detalleEncargado($id)
    {
        $encargado = Encargado::find($id);     
        $equipo = DB::table('t_equipo')->where('id_encargado',$id)->paginate(9);  
        return View::make('EncargadoDetalle', array('encargado' => $encargado,'equipo'=>$equipo));          
    } 
     public function exportarPDFEncargado($valor)
    {
       $encargado = Encargado::all();    
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
                <h1> Lista de los Encargados</h1>
                <table >
                    <thead>
                    <tr>                       
                        <th>Id </th>
                        <th>Nombre</th>
                        <th> Apellido</th> 
                        <th>Sexo </th>                        
                         <th>Edad</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Cargo</th>
                        <th>Contrata</th> 
                    </tr>
                </thead>";
       foreach ($encargado as $encargado){
           $html.="<tr><td>".$encargado->id_enc."</td>";
           $html.="<td>".$encargado->nombre_enc."</td>";
           $html.="<td>".$encargado->apellido_enc."</td>";
           $html.="<td>".$encargado->sexo_enc."</td>";
           $html.="<td>".$encargado->edad_enc."</td>";
           $html.="<td>".$encargado->dni_enc."</td>";
           $html.="<td>".$encargado->telefono_enc."</td>";
           $html.="<td>".$encargado->cargo_enc."</td>";           
           $html.="<td>".$encargado->tipo_contrata_enc."</td></tr>";           
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