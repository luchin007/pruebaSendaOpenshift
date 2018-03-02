<?php
class Encargado extends Eloquent{ //Todos los modelos deben extender la clase Eloquent  
    public $timestamps = false;
    protected $table = 't_encargado';
    protected $fillable = array('id_enc','id_of', 'nombre_enc', 'apellido_enc', 'sexo_enc', 'edad_enc', 'dni_enc', 'telefono_enc', 'cargo_enc', 'tipo_contrata_enc');
    protected $primaryKey = "id_enc";   
}
?>