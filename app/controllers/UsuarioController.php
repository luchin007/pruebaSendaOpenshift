<?php
 use Doctrine\Common\Cache\CacheProvider as DoctrineCache;
class UsuarioController extends BaseController {
 
    public function logeoUsuario()
    {
        if (Auth::attempt( array('usuario' => Input::get('usuario'), 'password' => Input::get('password') ), true )){
            return Redirect::to('inicio');
        }
        else{
             return Redirect::to('iniciar_sesion')->with('mensaje_login', 'Usuario o Contraseña invalido');
        }
    }
    
    public function logoutUsuario()
    {
        Auth::logout();       
        Session::flush();     
        return Redirect::to('iniciar_sesion')->with('mensaje_login', 'Ingrese nuevamente');
    }
    
    public function mostrarUsuario()
    {
        $usuario = Usuario::all();        
        return View::make('UsuarioMenu', array('usuario' => $usuario));      
    }
   
    
    public function crearUsuario()
    {
        
            $contraEncritada=Hash::make(Input::get("password"));         
            $fecha = trim(Input::get("fecha_nac_user"));        
            $fecha_corregida=str_replace(' ', '', $fecha);  
            $fecha_corregida = str_replace('/', '-', $fecha_corregida);
            $fecha_corregida=date("Y-m-d", strtotime($fecha_corregida));
            $query="INSERT INTO t_usuario VALUES (NULL,'".Input::get("usuario")."','".$contraEncritada."','".Input::get("tipo_user") 
                    ."','".Input::get("apellido_user") ."','".Input::get("nombre_user") ."','". Input::get("dni_user")."','".Input::get("cargo_user")
                    ."','".Input::get("sexo_user")."','".$fecha_corregida ."','".Input::get("direccion_user")."','".Input::get("telefono_user")
                    ."','".Input::get("correo_user")."',CURRENT_TIMESTAMP,'' ,NULL)";              
            DB::select($query);
            return Redirect::to('iniciar_sesion');
            try {
        } catch (Exception $exc) {
            echo '<script type="text/javascript">'
                    . 'setTimeout("history.back(1)", 20);'
                    . 'alert("El nombre de Usuario que ingreso ya existe");'                      
                    . '</script>  '; 
        }

        
    }
    public function modificarUsuarioVista()
    {        
        return View::make('UsuarioModificar');       
    }
 
 
    public function modificarUsuario()
    {        
            $fecha = trim(Input::get("fecha_nac_user"));        
            $fecha_corregida=str_replace(' ', '', $fecha);  
            $fecha_corregida = str_replace('/', '-', $fecha_corregida);
            $fecha_corregida=date("Y-m-d", strtotime($fecha_corregida));
       $usuario = Usuario::find(Input::get('id_user')); 
       $usuario->tipo_user=Input::get('tipo_user');
       $usuario->apellido_user=Input::get('apellido_user');
       $usuario->nombre_user=Input::get('nombre_user');     
       $usuario->dni_user=Input::get('dni_user');   
       $usuario->cargo_user=Input::get('cargo_user');  
       $usuario->sexo_user=Input::get('sexo_user');  
       $usuario->fecha_nac_user=$fecha_corregida;  
       $usuario->direccion_user=Input::get('direccion_user');  
       $usuario->telefono_user=Input::get('telefono_user');  
       $usuario->correo_user=Input::get('correo_user'); 
       $usuario->cargo_user=Input::get('cargo_user'); 
           
        
       $usuario->save();
       
       return Redirect::to('menu_usuario');
    }
 
     public function eliminarUsuario($id)
    {
        $usuario = Usuario::find($id);     
        $usuario->delete();
       
       return Redirect::to('menu_usuario');       
    }   
     public function registroActividadUsuario($id)
    {
         $registro = AuditoriaRegistro::paginate(9);        
        return View::make('UsuarioAuditoria', array('auditora' => $registro));    
    }   
    
    
    
}
?>