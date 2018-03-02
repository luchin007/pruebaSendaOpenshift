<!DOCTYPE HTML>
<html >
<head>
  <meta charset="UTF-8">
  <title>Inicio de Sesion</title>
  
  
      <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        
        
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/login.js"></script>   
      <script type="text/javascript" src="js/misJavaScript.js"></script>  

  
</head>

<body> <img src="img/fondoSesion.png" width="100%">
  <div class="logmod">
  <div class="logmod__wrapper">   
    <div class="logmod__container">
      <ul class="logmod__tabs">
        <li data-tabtar="lgm-2"><a href="#">Inicie Sesión</a></li>
        <li data-tabtar="lgm-1"><a href="#">Registrese</a></li>
      </ul>
      <div class="logmod__tab-wrapper">
      <div class="logmod__tab lgm-1">
       
        <div class="logmod__form">
          {{ Form::open(array('url' => 'creando_usuario','onsubmit'=>'return compararContraseña();','class'=>'simform')) }}
          <div id="divRegistro">                  
            <div class="sminputs">
              <div class="input string optional">
                <label class="string optional" for="user-name">Nombre de Usuario</label>
                <input class="string optional" name="usuario" maxlength="255" placeholder="Usuario" type="text" size="50" onkeypress="return validarNombreUsuario(event)" required />
                <input type="hidden" id="contraseña" name="password">
                    
              </div>            
              <div class="input string optional">
                <label class="string optional" for="user-pw">Contraseña *</label>
                <input class="string optional" id="contraseña1" maxlength="255" id="user-pw" placeholder="Contraseña" type="password" size="50" required />
              </div>
              <div class="input string optional">
                <label class="string optional" for="user-pw-repeat">Repita la Contraseña *</label>
                <input class="string optional" id="contraseña2" maxlength="255" id="user-pw-repeat" placeholder="Repita la Contraseña" type="password" size="50" required />
            </div>                
         </div>
         </div>
              <div class="sminputs">
              <div class="input string optional">
                <label class="string optional" for="user-pw">Apellido *</label>
                <input class="string optional" name="apellido_user" maxlength="255" id="user-pw" placeholder="Apellido" type="text" size="50" />
              </div>
              <div class="input string optional">
                <label class="string optional" for="user-pw-repeat">Nombre *</label>
                <input class="string optional" name="nombre_user" maxlength="255" id="user-pw-repeat" placeholder="Nombre" type="text" size="50" />
              </div>
              <div class="input string optional">
                <label class="string optional" for="user-pw">DNI *</label>
                <input class="string optional" name="dni_user" maxlength="8" id="user-pw" placeholder="DNI" type="text" size="50" onkeypress="return validarNumeros(event)" />
              </div>
            </div>
              <div class="sminputs">              
              <div class="input string optional">
                <label class="string optional" for="user-pw-repeat">Tipo de Usuario *</label>
                 {{Form::select('tipo_user', array('Usuario'=>'Usuario','Visitante'=>'Visitante','Administrador'=>'Administrador'),array('class' => 'form-control'))}}
              </div>  
              <div class="input string optional">
                <label class="string optional" for="user-pw">Fecha de nacimiento *</label>
               <input type="date" class="string optional" name="fecha_nac_user" step="1"  value="{{date("d")}} / {{ date("m")}} / {{date("Y")}}">
                
              </div>
              <div class="input string optional">
                <label class="string optional" for="user-pw-repeat">Sexo *</label>
               {{Form::select('sexo_user', array('Masculino'=>'Masculino','Femenino'=>'Femenino'),array('class' => 'form-control'))}}
              </div>                
            </div>
              <div class="sminputs">              
              <div class="input string optional">
                <label class="string optional" for="user-pw-repeat">Direccion *</label>
                <input class="string optional" name="direccion_user" maxlength="255" id="user-pw-repeat" placeholder="Direccion" type="text" size="50" />
              </div>   
              <div class="input string optional">
                <label class="string optional" for="user-pw">Correo Electronico *</label>
                <input class="string optional" name="correo_user" maxlength="255" id="user-pw" placeholder="Correo Electronico" type="email" size="50" />
              </div>
              <div class="input string optional">
                <label class="string optional" for="user-pw-repeat">Telefono *</label>
                <input class="string optional" name="telefono_user"  maxlength="10" id="user-pw-repeat" placeholder="Telefono" type="text" size="50" onkeypress="return validarNumeros(event)" />
              </div>                    
            </div>
              
              
              
            <div class="simform__actions">
              {{Form::submit('Crear Usuario',array('class' => 'sumbit'))}}
              <span class="simform__actions-sidetext">Gracias por registrarse <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></span>
            </div> 
        </div>         
      </div>
      <div class="logmod__tab lgm-2">
        <div class="logmod__heading">
          <span class="logmod__heading-subtitle">Ingrese su nombre de usuario y su contraseña <strong>to sign in</strong></span>
        </div> 
          <div id="contenedorLogin">
       {{ Form::close() }}       
            
       
       
       
       
        <div class="logmod__form">
          {{ Form::open(array('url' => 'iniciando_usuario','class'=>'simform')) }}
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-name">Nombre de Usuario*</label>
                <input class="string optional" name="usuario" maxlength="255" id="user-email" placeholder="Usuario" type="text" size="50" />
              </div>
            </div>
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-pw">Contraseña *</label>
                <input class="string optional" name="password" maxlength="255" id="user-pw" placeholder="Contraseña" type="password" size="50" />
                						<span class="hide-password">Mostrar</span>
              </div>
            </div>
            <div class="simform__actions">
             {{Form::submit('Entrar',array('class' => 'sumbit'))}}             
              <span class="simform__actions-sidetext"><a class="special" role="link" href="#"> @if (Session::has('mensaje_login'))
        <span>{{ Session::get('mensaje_login') }}</span>
     @endif<br></a></span>
            </div> 
         {{ Form::close() }}
        </div> 
     
          </div>
      </div>
    </div>
  </div>
</div>
 
</body>
</html>