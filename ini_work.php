<?php
        session_start();
	$nombre = $_REQUEST['nombre'];
	$contra = $_REQUEST['contrasena'];
	$clave = $_REQUEST['clave'];

   $servidor = "localhost";
   $usuario = "id18843915_root";
   $contrasena = "19Ru18be17n*";
   $basededatos = "id18843915_mydb";

           $conexion = mysqli_connect( $servidor, $usuario, $contrasena);
           $db = mysqli_select_db( $conexion, $basededatos );

                $u = "SELECT nombre,contrasenya FROM trabajadores WHERE nombre='$nombre'";
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
			header('location: dash.php');
		}else{
                        if($clave != 'macaco'){
                                setcookie('cod','1');
                                setcookie('error','La clave es incorrecta');
                                header('location: login_2.0_work.php');
                        }else{
                                setcookie('cod','1');
                                setcookie('error','Nombre de usuario o contraseña inccorrectos');
                                header('location: login_2.0_work.php');
                        }       
                }
?>