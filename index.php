<?php
  session_start();

  if(isset($_SESSION['usuario'])){
    header("Location: sistemas.php");
  }

?>
<!DOCTYPE html5>
<html lang="es">
<head>
        <title>Sistema de finanzas</title>
        <link rel="icon" href="Imagenes/imagen.ico">
        <link rel="stylesheet" href="css/estilo.css">
        <meta charset="utf-8">
        <!--La pantalla no sera escalable-->
        <meta name="viewport" content="width=device-width, user-scalable, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
  <div class="todo">
        <header class="tiu">
              <h1 style="background-color:rgb(157, 116, 116);">BIENVENIDO<br> Iniciar sesion</h1>
        </header>
        </div>
         <div class="container">
            <form action="login.php" method="POST" >
                <h2 class="titulo">REGISTRAR</h2>
                <div class="padre">
                    <div class="nombre">
                        <label for="">DNI:</label>
                        <input type="number" name="dni" id="dni" placeholder="DNI" pattern="[0-9]+" maxlength="8"   required="" >
                    </div>
                    <div class="user">
                        <label for="correo">Correo Electronico:</label>
                        <input type="email" id="correo" name="correo" placeholder="Ingrese su Correo" required="">
                    </div>
                    <div class="clave">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña"  required="">
                    </div>
                    <div >
                        <center> 
                          <input class="boton" name="Ingresar" type="submit" value="Ingresar">
                    </div>
                    <div class="opcion">
                        <a href="cuenta.php">Crear Cuenta</a> 
                        </center>
                    </div> 
                </div>
            </form>
            
         </div>  
  </div>
</body>
