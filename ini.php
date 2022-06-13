<?php
        session_start();
	$nombre = $_REQUEST['nombre'];
	$contra = $_REQUEST['contra'];

        $servidor = "localhost";
        $usuario = "id18843915_root";
        $contrasena = "19Ru18be17n*";
        $basededatos = "id18843915_mydb";

        $conexion = mysqli_connect( $servidor, $usuario, $contrasena);
        $db = mysqli_select_db( $conexion, $basededatos );

        $u = "SELECT nombre,contrasenya FROM usuarios WHERE nombre='$nombre'";
        $resultado = mysqli_query( $conexion, $u) or die ( "no");
        while ($columna = mysqli_fetch_array( $resultado )){
                $usr = $columna[0];
                $cnt = $columna[1];
        
        }


        if($usr==$nombre && $cnt==$contra){
                        $n1 = $nombre;
                        $_SESSION['nom'] = $n1;
                        $c1 = $contra;
                        $_SESSION['cont'] = $c1;
			header('location: index.php');
		}else{
                        setcookie('cod','1');
                        setcookie('error','Nombre de usuario o contraseña inccorrectos');
                        header('location: login_2.0.php');
                }
?>