
<!DOCTYPE html5>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>REGISTRATE</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cuenta.css">
    <script src="https://kit.fontawesome.com/5aca6753f1.js" crossorigin="anonymous"></script>
</head>

<body>
   <div class="cajita">
    <div class="container-formulario contenedor">
        <div class="imagen"></div>
        <form action="registro.php" method="POST" class="formulario" >
            <div class="inicio-formulario">
                <h2>BIENVENIDO DE NUEVO</h2>
                <h4>Crea tu cuenta</h4>
            </div>
            <div class="input">
                <i class="fa-regular fa-id-card"></i>
                <input type="tesxt" id="dni" name="dni" pattern="[0-9]+" maxlength="8" placeholder="Ingrese su DNI" required="">
            </div>
            <br>
            <div class="input">
                <i class="fa-regular fa-user"></i>
                <input type="text" id="usuario" name="usuario" placeholder="Nombre de Usuario" required="">
            </div>
            <br>
            <div class="input">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" id="correo" name="correo" placeholder="Correo Electronico" required="">
            </div>
            <br>
            <div class="input">
                <i class="fa-solid fa-check"></i>
                <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña"required="">
            </div>
            <br>
            <center>
            <div class="button">
                <input type="submit" name="Registrarse" value="Registrarse">
            
            </div>
            <div class="texto">
                <p>Al registrarse, aceptas nuestras Condiciones de uso y Política de Privacidad</p>
                <p>¿Ya tienes una Cuenta?<a class="link" href="index.php">Iniciar sesión</a></p>
            </div>
        </center>
        </form>
    </div>
  </div>
</body>
</html>