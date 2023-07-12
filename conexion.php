
<?php
$servername = "192.168.1.93";
$username = "initbox";
$password = "12345678";
$dbname = "basededatos";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn){
  echo 'Conexion exitosa a la base de datos';

}else{
  echo'No se ah podido conectar a la base de datos';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de finanzas</title>
</head>
<body>
    <!-- Aquí va el contenido HTML de mi página -->
</body>
</html>
