<?php



Route::get('/inicio', function()
{
	return View::make('inicio');
});
Route::get('/iniciar_sesion', function()
{
	return View::make('inicioSesion');
});
// con esto se crean los usuarios
Route::post('creando_usuario', array('uses' => 'UsuarioController@crearUsuario'));
Route::post('iniciando_usuario', array('uses' => 'UsuarioController@logeoUsuario'));
Route::get('saliendo_usuario', array('uses' => 'UsuarioController@logoutUsuario'));



/* Filtro general */
Route::group(array('before' => 'usuarioLogeado'), function(){
    
    Route::get('/', function()
{
	return View::make('inicio');
});
   

    /*  routes de programas*/
    Route::get('menu_programa', array('uses' => 'ProgramaController@mostrarPrograma'));
    Route::get('buscar_programa{valor}', array('uses' => 'ProgramaController@buscarPrograma'));
    Route::get('nuevo_programa', array('uses' => 'ProgramaController@crearProgramaVista'));
    Route::post('insertar_programa', array('uses' => 'ProgramaController@crearPrograma'));
    Route::get('modificar_programa{id}', array('uses' => 'ProgramaController@modificarProgramaVista'));
    Route::post('modificando_programa', array('uses' => 'ProgramaController@modificarPrograma'));
    Route::get('eliminar_programa{id}', array('uses' => 'ProgramaController@eliminarPrograma'));
    Route::get('exportar_pdf_programa{valor}', array('uses' => 'ProgramaController@exportarPDFPrograma'));


    /*  routes de oficina*/
    Route::get('menu_oficina', array('uses' => 'OficinaController@mostrarOficina'));
    Route::get('buscar_oficina{valor}', array('uses' => 'OficinaController@buscarOficina'));
    Route::get('nuevo_oficina', array('uses' => 'OficinaController@crearOficinaVista'));
    Route::post('insertar_oficina', array('uses' => 'OficinaController@crearOficina'));
    Route::get('modificar_oficina{id}', array('uses' => 'OficinaController@modificarOficinaVista'));
    Route::post('modificando_oficina', array('uses' => 'OficinaController@modificarOficina'));
    Route::get('eliminar_oficina{id}', array('uses' => 'OficinaController@eliminarOficina'));
    Route::get('detalle_oficina{valor}', array('uses' => 'OficinaController@DetalleOficina'));
    Route::get('exportar_pdf_oficina{valor}', array('uses' => 'OficinaController@exportarPDFOficina'));

    /*  routes de usuario*/
    Route::get('menu_usuario', array('uses' => 'UsuarioController@mostrarUsuario'));
    Route::get('nuevo_usuario', array('uses' => 'UsuarioController@crearUsuarioVista'));
    Route::post('insertar_usuario', array('uses' => 'UsuarioController@crearUsuario'));
    Route::get('modificar_usuario', array('uses' => 'UsuarioController@modificarUsuarioVista'));
    Route::post('modificando_usuario', array('uses' => 'UsuarioController@modificarUsuario'));
    Route::get('eliminar_usuario{id}', array('uses' => 'UsuarioController@eliminarUsuario'));    
     Route::get('actividad_usuario{id}', array('uses' => 'UsuarioController@registroActividadUsuario')); 
    

    /*  routes de encargado*/
    Route::get('menu_encargado', array('uses' => 'EncargadoController@mostrarEncargado'));
    Route::get('buscar_encargado{valor}', array('uses' => 'EncargadoController@buscarEncargado'));
    Route::get('nuevo_encargado', array('uses' => 'EncargadoController@crearEncargadoVista'));
    Route::post('insertar_encargado', array('uses' => 'EncargadoController@crearEncargado'));
    Route::get('modificar_encargado{id}', array('uses' => 'EncargadoController@modificarEncargadoVista'));
    Route::post('modificando_encargado', array('uses' => 'EncargadoController@modificarEncargado'));
    Route::get('eliminar_encargado{id}', array('uses' => 'EncargadoController@eliminarEncargado'));
    Route::get('detalle_encargado{id}', array('uses' => 'EncargadoController@detalleEncargado'));
    Route::get('exportar_pdf_encargado{valor}', array('uses' => 'EncargadoController@exportarPDFEncargado'));

    /*  routes de equipo*/
    Route::get('menu_equipo', array('uses' => 'EquipoController@mostrarEquipo'));
    Route::get('buscar_equipo{valor}', array('uses' => 'EquipoController@buscarEquipo'));
    Route::get('nuevo_equipo', array('uses' => 'EquipoController@crearEquipoVista'));
    Route::get('detalle_equipo{id}', array('uses' => 'EquipoController@detalleEquipoVista'));
    Route::post('insertar_equipo', array('uses' => 'EquipoController@crearEquipo'));
    Route::get('modificar_equipo{id}', array('uses' => 'EquipoController@modificarEquipoVista'));
    Route::post('modificando_equipo', array('uses' => 'EquipoController@modificarEquipo'));
    Route::get('eliminar_equipo{id}', array('uses' => 'EquipoController@eliminarEquipo'));
    Route::get('exportar_pdf_equipo{valor}', array('uses' => 'EquipoController@exportarPDFEquipo'));
    Route::get('mostrar_equipos_estado{valor}', array('uses' => 'EquipoController@mostrarEquipoEstado'));
    Route::get('mostrar_equipos_tipo{valor}', array('uses' => 'EquipoController@mostrarEquipoTipo'));
    Route::get('mostrar_equipos_fecha{valor}', array('uses' => 'EquipoController@mostrarEquipoFecha'));

    /* routes generales de los rreportes */
    Route::get('menu_reporte', array('uses' => 'ReporteController@mostrarReporte'));
});