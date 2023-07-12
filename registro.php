
<?php
include 'conexion.php';

$dni=$_POST['dni'];
$usuario=$_POST['usuario'];
$correo=$_POST['correo'];
$contraseña=md5($_POST['contraseña']);

$consulta ="INSERT INTO usuarios(dni, usuario, correo, contraseña)
             VALUES('$dni', '$usuario', '$correo', '$contraseña')";

//verificar que el correo no se repita en la BD
$verificacion_correo=mysqli_query($conn, "SELECT * FROM usuarios WHERE correo='$correo'");

if(mysqli_num_rows($verificacion_correo) > 0 ){
  echo '<script>alert("Este correo ya esta registrado, intentelo nuevamente");
        window.location = "cuenta.php";</script>';
        exit();
}

//Verificacion de usuario en la base DB
$verificacion_usuario=mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario='$usuario'");

if(mysqli_num_rows($verificacion_usuario) > 0 ){
  echo '<script>alert("Este usuario ya esta registrado, registre otro diferente");
        window.location = "cuenta.php";</script>';
        exit();
}
$resultado = mysqli_query($conn, $consulta);

if($resultado){
  echo '<script>alert("Usuario almacenado exitosamente");
        window.location = "index.php";</script>';

}else{
  echo '<script>alert("Intentelo de nuevo, usuario no almacenado");
        window.location = "cuenta.php";</script>';
}

mysqli_close($conn);
