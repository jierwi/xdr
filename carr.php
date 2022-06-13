<?php
session_start();
 $servidor = "localhost";
 $usuario = "id18843915_root";
 $contrasena = "19Ru18be17n*";
 $basededatos = "id18843915_mydb";

          $conexion = mysqli_connect( $servidor, $usuario, $contrasena);
          $db = mysqli_select_db( $conexion, $basededatos );

$value = $_SESSION['nom'];
$value1 = $_SESSION['cont'];

  $cp = "SELECT idUsuarios FROM usuarios WHERE nombre='$value'";
  $resultado = mysqli_query( $conexion, $cp);
  while ($columna = mysqli_fetch_array( $resultado )){
    $p = $columna[0];
    
  }

  if($p == NULL){
    setcookie('cod','1');
    setcookie('error','Inicia sesión para comprar algún producto');
    header('location:login_2.0.php');
  }else{
    $id = $_REQUEST['id'];

    $cart=$_COOKIE['carr'];
    $cart++;
    setcookie('carr', "$cart");

    setcookie("$cart", "$id");

    header('location:productos2.0.php');
  }
?>