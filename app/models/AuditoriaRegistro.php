<?php
class AuditoriaRegistro extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    public $timestamps = false;
    protected $table = 'auditoria_registro';
    protected $fillable = array('id','id_user', 'id_equipo', 'fecha_reg', 'equipo_reg', 'port_reg','ip_reg','observaciones');
    protected $primaryKey = "id";
}
?>