<?php
class Equipo extends Eloquent{ //Todos los modelos deben extender la clase Eloquent  
    public $timestamps = false;
    protected $table = 't_equipo';
    protected $fillable = array('id_eq','id_encargado', 'id_oficina', 'tipo_eq', 'estado_eq', 'numero_por_of', 'mac_eq', 'ip_eq', 'marca_eq', 'modelo_eq', 'fecha_compra_eq', 'procesador', 'placa', 'ram', 'sistema_operativo', 'monitor', 'teclado', 'lectora', 'parlantes', 'estabilizador', 'otros');
    protected $primaryKey = "id_eq";   
}
?>