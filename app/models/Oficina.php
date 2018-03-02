<?php
class Oficina extends Eloquent{ //Todos los modelos deben extender la clase Eloquent  
    public $timestamps = false;
    protected $table = 't_oficina';
    protected $fillable = array('id_oficina','nombre_oficina','edificio_oficina', 'num_piso', 'detalle_oficina');
    protected $primaryKey = "id_oficina";   
}
?>