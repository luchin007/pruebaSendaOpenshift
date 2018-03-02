<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
class Usuario extends Eloquent implements  UserInterface,RemindableInterface{ //Todos los modelos deben extender la clase Eloquent
     use UserTrait, RemindableTrait;
     public $timestamps = false;
    protected $table = 't_usuario';
    protected $fillable = array('id_user','usuario', 'password', 'tipo_user', 'apellido_user', 'nombre_user', 'dni_user', 'cargo_user', 'direccion_user', 'telefono_user', 'sexo_user', 'fecha_nac_user', 'fecha_reg_user');
    protected $primaryKey = "id_user";
    protected $hidden =array("password","remember_token");
    
     public function getAuthIdentifier()
    {     
        return $this->getKey();
    }
    
    //este metodo se debe implementar por la interfaz
    // y sirve para obtener la clave al momento de validar el inicio de sesión
    public function getAuthPassword()
    {
        return $this->password;
    }
    
}
?>