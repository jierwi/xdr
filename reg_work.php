<?php
	/*---formulario registro---*/
	$nombre = $_REQUEST['nombre'];
	$correo = $_REQUEST['correo'];
	$contra = $_REQUEST['contra'];
	$clave = $_REQUEST['clave'];

	/*---conexion bbdd---*/
	$servidor = "localhost";
	$usuario = "id18843915_root";
	$contrasena = "19Ru18be17n*";
	$basededatos = "id18843915_mydb";

	$conexion = mysqli_connect( $servidor, $usuario, $contrasena);
	$db = mysqli_select_db( $conexion, $basededatos );

	$comp = "SELECT * FROM trabajadores WHERE nombre LIKE '$nombre'";
	$resultado = mysqli_query( $conexion, $comp );
	/*----------comprovacion registro----------*/
	while ($columna = mysqli_fetch_array( $resultado )){
		$v = $columna[1];
	}
	if(!empty($v)){
		if($v == $nombre){
			setcookie('cod','1');
			setcookie('error','Ese nombre ya esta en uso o estás ya registrado');
            header('location:login_2.0_work.php');
		}
	}else{
		if($clave == 'macaco'){
				$sql = "INSERT INTO trabajadores (nombre, correo, contrasenya) VALUES ('$nombre', '$correo', '$contra')";
				$resultado = mysqli_query( $conexion, $sql ) or die ( "Algo ha ido mal en la consulta a la base de datos");

				setcookie('cod','0');
				setcookie('error','Te has registrado con éxito, inicia sesión');
				header('location:login_2.0_work.php');
			}else{
				setcookie('cod','1');
                setcookie('error','Clave incorrecta');
				header('location:login_2.0_work.php');
			}
	}
?>