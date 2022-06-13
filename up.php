<?php
session_start();
  $value = $_SESSION['nom'];
  $value1 = $_SESSION['cont'];
  $servidor = "localhost";
  $usuario = "id18843915_root";
  $contrasena = "19Ru18be17n*";
  $basededatos = "id18843915_mydb";

           $conexion = mysqli_connect( $servidor, $usuario, $contrasena);
           $db = mysqli_select_db( $conexion, $basededatos );

           $u = "SELECT nombre,contrasenya FROM trabajadores WHERE nombre='$value'";
           $resultado = mysqli_query( $conexion, $u);
           while ($columna = mysqli_fetch_array( $resultado )){
            $si=$columna[0];
           }

           if($si==NULL){
            header('location:index.html');
           }

    $up = $_REQUEST['up'];
    if($up == "dash"){
          $id = $_REQUEST['id'];
          $tiempo = $_REQUEST['tiempo'.$id];
          $estado = $_REQUEST['estado'.$id];
          $proy = $_REQUEST['proy'.$id];
          
          $pan = "UPDATE proyectos SET estado= '$estado', tiempo_estimado=$tiempo WHERE idProyectos=$proy";
          $res = mysqli_query( $conexion, $pan);

          $pan1 = "UPDATE pedidos SET estado_envio= '$estado' WHERE idProyectos=$proy";
          $res1 = mysqli_query( $conexion, $pan1);

          header('location:dash.php');
      }else{
        if($up == "piezas"){
          $id = $_REQUEST['id'];
          $tipo = $_REQUEST['tipo'.$id];
          $material = $_REQUEST['material'.$id];
          $proy = $_REQUEST['proy'.$id];
          
          $pan = "UPDATE piezas SET tipo= '$tipo', material= '$material' WHERE idPiezas=$proy";
          $res = mysqli_query( $conexion, $pan);

          header('location:piezas.php');

        }else{
          if($up == "prod"){
            echo $up;
          }else{
            if($up == "proyectos"){
              $id = $_REQUEST['id'];
              $estado = $_REQUEST['estado'.$id];
              $tiempo = $_REQUEST['tiempo'.$id];
              $trab = $_REQUEST['trab'.$id];
              $proy = $_REQUEST['proy'.$id];
              echo $trab;

              $pan = "UPDATE proyectos SET estado= '$estado', tiempo_estimado= '$tiempo' WHERE idProyectos=$proy";
              $res = mysqli_query( $conexion, $pan);

              $si = "SELECT idTrabajadores FROM trabajadores WHERE nombre='$trab'";
              $resultado = mysqli_query( $conexion, $si);
              while ($columna = mysqli_fetch_array( $resultado )){
                $iidd = $columna[0];
              }

              $pan = "UPDATE proyectos_trabajadores SET idTrabajadores = $iidd WHERE idProyectos=$proy";
              $res = mysqli_query( $conexion, $pan);

              $pan = "UPDATE pedidos SET estado_envio= '$estado' WHERE idProyectos=$proy";
              $res = mysqli_query( $conexion, $pan);
            
              header('location:proyectos.php');

            }else{
              if($up == "trab"){
                echo $up;
              }else{
                if($up == "usr"){
                    echo $up;
                }
      }}}}}
?>