<?php
session_start();
$value = $_SESSION['nom'];

$servidor = "localhost";
$usuario = "id18843915_root";
$contrasena = "19Ru18be17n*";
$basededatos = "id18843915_mydb";

         $conexion = mysqli_connect( $servidor, $usuario, $contrasena);
         $db = mysqli_select_db( $conexion, $basededatos );

$nombre=$_REQUEST['nombre'];
$email=$_REQUEST['email'];
$tel=$_REQUEST['tel'];
$direc=$_REQUEST['direc'];
$dni=$_REQUEST['dni'];
$tarj=$_REQUEST['tarj'];
$fech=$_REQUEST['fech'];

echo $fech;

    $u = "SELECT idUsuarios FROM usuarios WHERE nombre='$value'";
    $resultado = mysqli_query( $conexion, $u);
    while ($columna = mysqli_fetch_array( $resultado )){
    $si=$columna[0];
    }

    $pan = "UPDATE usuarios SET nombre = '$nombre', email = '$email', telefono = '$tel', 
    direccion = '$direc', dni = '$dni', tarjeta = '$tarj', fecha_nac = '$fech' WHERE idUsuarios=$si";
    $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");

    $_SESSION['nom'] = $nombre;

    header('location:perfil.php');

?>