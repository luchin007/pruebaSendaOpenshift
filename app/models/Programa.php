<?php
class Programa extends Eloquent{ //Todos los modelos deben extender la clase Eloquent  
    public $timestamps = false;
    protected $table = 't_programas';
    protected $fillable = array('id_programa','nombre_prog', 'version_prog', 'fecha_creacion_prog');
    protected $primaryKey = "id_programa";   
}
?>
