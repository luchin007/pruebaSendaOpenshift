<!DOCTYPE HTML>
<html lang="es-ES">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name="keywords" content="inventario,equipos,web,mpb,maria"/>
		<meta name="viewport" content="width=device-width, user=scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
		<!--esto sirve para ver cuando el usuario visita desde un equipo movil no haga zoom solo se desplaze
		el titulo sera modificado depende a las paginas-->
		<title>Inventario MPB</title>		  
                <link rel="stylesheet" type="text/css" href="css/styleMenu.css">
                <link rel="stylesheet" type="text/css" href="css/table.css"> 
                <link rel="stylesheet" href="css/bootstrap.css">
                <link rel="stylesheet" type="text/css" href="css/plantillas.css">                  
                <link rel="stylesheet" type="text/css" href="css/cssModal.css">
                                 
                <link rel="stylesheet" type="text/css" href="css/login.css">
                        
                
                <script src="js/bootstrap.min.js"></script>
                 <script src="js/misJavaScript.js"></script>            
                
	</head>

	<body>                             
		<div class="content" > 
			<!--nuestra navegación-->
			<div class="header">
				
				<div class="logoUnamba">
					<a href="inicio" >
						<img src="img/MPBLogo.png" id="unambaLogo">	
						<img src="img/MPBNombre.png" id="unambaNombre">					
					</a>
					
				</div>	
                            
				<div class="login">
                                    
                                    @if (Session::has('mensaje_login'))
                                        <span>{{ Session::get('mensaje_login') }}</span>
                                     @endif                                  
                                        <table >
						<tr><td><h1><h3>{{Auth::user()->nombre_user}} </h3><h3>{{Auth::user()->apellido_user}} </h3><p>{{Auth::user()->tipo_user}}</p></h1></td>
                                                    <td><img src="img/desconocido.png" id="fotoUsuario"> </td>
                                                    <td>                                                        
                                                            <ul  class="navConfiguracion">
                                                                <li >
                                                                    <a href="#"><img src="img/opcionesLogin.png" id="opcionesLogin"></a>
                                                                    <ul>
                                                                        <li> <a href="actividad_usuario">Registro de Actividad</a></li>
                                                                        <li> <a href="detalle_usuario">Detalles de Perfil</a></li>
                                                                        <li> <a href="modificar_usuario">Modificar Perfil</a></li>
                                                                        <li> <a href="eliminar_usuario{{Auth::user()->id_user}}">Darme de Baja</a></li>
                                                                        <li> <a href="saliendo_usuario">Salir (X)</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>	</td></tr>
						
					</table>
                                   
					
									
				</div>
				<h1>INVENTARIO DE EQUIPOS 2017</h1>
					<h3>Area de Innovación y Soporte Tecnológico</h1>					
					<P>Huancarama, {{date("d")}} / {{ date("m")}} / {{date("Y")}}</P>

			</div> 

			<!--  la parte del cuerpo biene aqui-->
			<div class="body">
				<div class="menuBar">
					<div id="divLogoOti">
                                            <a href="inicio" ><img src="img/logoMPB.png" id="logoOTI" ></a>
					</div>
					<div id="divMenuIzquierda">
						<ul id="menuIzquierda">
                                                  <li><a href="inicio" ><img src="img/principal.png"> <span >Principal</span></a></li>
						  <li><a href="menu_reporte"><img src="img/inventarioGeneral.png"><span >Lista General</span></a></li>
						  <li><a href="menu_equipo"><img src="img/equipos.png"><span >Equipos</span></a></li>
						  <li><a href="menu_oficina"><img src="img/oficinas.png"><span >Oficinas</span></a></li>
						  <li><a href="menu_encargado"><img src="img/encargados.png"><span >Encargados</span></a></li>
                                                  <li><a href="menu_programa"><img src="img/programas.png"><span>Programas</span></a></li>
                                                  <li><a href="menu_usuario"><img src="img/usuarios.png"><span>Usuarios</span></a></li>
						</ul>
					</div>					
					
				</div>
                            
				<div class="sideBar">
					<div class="bodyBar">
                                               @yield('inicio') 
                                               @yield('EncargadoMenu')
                                               @yield('EncargadoNuevo')
                                               @yield('EncargadoModificar')
                                               
                                               @yield('ProgramaMenu')
                                               @yield('ProgramaNuevo')
                                               @yield('ProgramaModificar')
                                               
                                               @yield('OficinaMenu')
                                               @yield('OficinaNuevo')
                                               @yield('OficinaModificar')
                                               
                                               @yield('UsuarioMenu')
                                               @yield('UsuarioNuevo')
                                                @yield('UsuarioModificar')
                                               
                                               @yield('EquipoMenu')
                                               @yield('EquipoNuevo')
                                               @yield('EquipoModificar')
                                               @yield('ReporteMenu')
                                               
                                               @yield('EncargadoDetalle')
                                               @yield('OficinaDetalle')
                                               
                                               
                                               
                                               
					</div>
				</div>				
			</div>	


			<!--  el pie de pagina viene aqui-->		
			<div class="footer">
				Area de Innovacion y Soporte Tecnológico MPB-Huancarama &#169 los derechos reservados
			</div>
		</div>
	</body>
</html>