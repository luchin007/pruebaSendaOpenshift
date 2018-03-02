<?php
 use Doctrine\Common\Cache\CacheProvider as DoctrineCache;
class ReporteController extends BaseController {
 
    public function mostrarReporte()
    {        
        return View::make('ReporteMenu');      
    }
   
    public function crearReporteVista()
    {
        return View::make('ReporteNuevo');
    }

    public function crearReporte()
    {
        $reporte=Input::all();               
        Reporte::create($reporte);
        return Redirect::to('menu_reporte');
    }
    public function modificarReporteVista($id)
    {
        $reporte = Reporte::find($id);     
        return View::make('ReporteModificar', array('reporte' => $reporte));       
    }
 
 
    public function modificarReporte()
    {        
       $reporte = Reporte::find(Input::get('id_enc')); 
       $reporte->nombre_enc=Input::get('nombre_enc');
       $reporte->apellido_enc=Input::get('apellido_enc');
       $reporte->sexo_enc=Input::get('sexo_enc');
       $reporte->edad_enc=Input::get('edad_enc');
       $reporte->dni_enc=Input::get('dni_enc');
       $reporte->telefono_enc=Input::get('telefono_enc');
       $reporte->cargo_enc=Input::get('cargo_enc');
       $reporte->tipo_contrata_enc=Input::get('tipo_contrata_enc');
       $reporte->save();
       
       return Redirect::to('menu_reporte');
    }
 
     public function eliminarReporte($id)
    {
        $reporte = Reporte::find($id);     
        $reporte->delete();
       
       return Redirect::to('menu_reporte');       
    }   
    
}
?>