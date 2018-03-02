<?php
class EquipoPrograma extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    public $timestamps = false;
    protected $table = 'tr_equipo_programa';
    protected $fillable = array('id_equipo','id_programa');
    
}
?>

