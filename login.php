<?php
    session_start();
    include 'conexion.php';
    
    $dni=$_POST['dni'];
    $correo=$_POST['correo'];
    $contraseña=md5($_POST['contraseña']);

    $validar_login=mysqli_query($conn, "SELECT * FROM usuarios WHERE dni='$dni' AND correo='$correo' AND contraseña='$contraseña'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario']=$correo;
        header("Location: sistemas.php");
        exit();
    }else{
        echo '<script>alert("Este usuario no existe, verifique los datos o cree una cuenta");
        window.location = "index.php";</script>';
        exit();

    }
?>