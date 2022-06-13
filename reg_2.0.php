<?php
	/*---formulario registro---*/
	$nombre = $_REQUEST['nombre'];
	$correo = $_REQUEST['correo'];
	$contra = $_REQUEST['contra'];
	$contra1 = $_REQUEST['contra1'];

	/*---conexion bbdd---*/
	$servidor = "localhost";
	$usuario = "id18843915_root";
	$contrasena = "19Ru18be17n*";
	$basededatos = "id18843915_mydb";

	$conexion = mysqli_connect( $servidor, $usuario, $contrasena) or die ("No se ha podido conectar al servidor de Base de datos");
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

	$comp = "SELECT * FROM usuarios WHERE nombre LIKE '$nombre'";
	$resultado = mysqli_query( $conexion, $comp );
	/*----------comprovacion registro----------*/
	while ($columna = mysqli_fetch_array( $resultado )){
		$v = $columna[1];
	}
	if(!empty($v)){
		if($v == $nombre){
			setcookie('cod','1');
			setcookie('error','Ese nombre ya esta en uso o estás ya registrado');
            header('location:login_2.0.php');
		}
	}else{
		if($contra == $contra1){
			$sql = "INSERT INTO usuarios (nombre, email, contrasenya, activo) VALUES ('$nombre', '$correo', '$contra', '1')";
			$resultado = mysqli_query( $conexion, $sql ) or die ( "Algo ha ido mal en la consulta a la base de datos");

			$user = "CREATE USER '$nombre'@'$servidor' IDENTIFIED BY '$contra'";
			$resultado1 = mysqli_query( $conexion, $user );

			$grant = "GRANT ALL PRIVILEGES ON *.* to '$nombre'@'$servidor' identified by '$contra'";
			$resultado2 = mysqli_query( $conexion, $grant );
			setcookie('cod','0');
			setcookie('error','Te has registrado con éxito, inicia sesión');
			header('location:login_2.0.php');
			}else{
				setcookie('cod','1');
                setcookie('error','Las contraseñas no coinciden');
            	header('location:login_2.0.php');
			}
	}
?>