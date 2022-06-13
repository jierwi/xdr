<?php
  $edit = $_REQUEST['edit'];
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
           $ord = "SELECT COUNT(idProyectos) FROM proyectos";
           $resultado = mysqli_query( $conexion, $ord) or die ( "Algo ha ido mal en la consulta a la base de datos");
           while ($columna = mysqli_fetch_array( $resultado )){
            $ord_t=$columna[0];
           }
           $pan = "SELECT pedidos.idUsuarios FROM pedidos";
           $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");
           ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_6.0.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
        <i class='bx bxs-dashboard'></i>
      <span class="logo_name">XDR</span>
    </div>
      <ul class="nav-links">
      <li>
          <a href="dash.php" class="active">
          <i class='bx bx-exit bx-flip-horizontal' ></i>
            <span class="links_name">Volver al panel</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Panel de edición</span>
      </div>
      <div class="search-box">

      </div>
      <?php
      if($value == "id18843915_root"){
        echo "<div class='profile-details'>";
        echo "<img src='images/toro_f_n.png' width='10%'>";
        echo "<span class='admin_name'>";
        echo $usuario;
        echo "</span>";
        echo "</div>";
      }else{
        echo "<div class='profile-details'>";
        echo "<img src='images/logo_n.png' width='10%'>";
        echo "<span class='admin_name'>";
        echo $value;
        echo "</span>";
        echo "</div>";
      }
      ?>
    </nav>
    <div class="home-content">
      <div class="sales-boxes">
        <?php
          if($edit == "dash"){
            echo "<div class='recent-sales box'>";
            echo "<div class='title'>Ventas recientes</div>"; 
            echo "<form method='post' action='up.php'>";
            echo "<div class='sales-details'>";
            echo "<ul class='details'>";
            echo "<li class='topic'>Id Usuario</li>";
            while ($columna = mysqli_fetch_array( $res ))
                {
                    echo "<li>" . $columna['0'] . "</li>";
                }
            echo "</ul>";
            echo "<ul class='details'>";
            echo "<li class='topic'>Estado</li>";
            $i=0;
            $pan = "SELECT pedidos.estado_envio FROM pedidos";
            $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $res ))
                {
                  echo "<li>";
                  echo "<input type='text' name= 'estado"."$i' value='$columna[0]'>";
                  echo "</li>";
                  $i++;
                }
            echo "</ul>";
            echo "<ul class='details'>";
            echo "<li class='topic'>Tiempo Estimado</li>";
            $i=0;
            $pan = "SELECT proyectos.tiempo_estimado FROM proyectos ";
            $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $res ))
                {
                    echo "<li>";
                    echo "<input type='text' name='tiempo"."$i' value='$columna[0]'>dias";
                    echo "</li>";
                    $i++;
                }
            echo "</ul>";
            echo "<ul class='details'>";
            echo "<li class='topic'>Total</li>";
            $pan = "SELECT pedidos.precio_total FROM pedidos";
            $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $res ))
                {
                    echo "<li>" . $columna['0'] . "€" . "</li>";

                }
            echo "</ul>";
            echo "<ul class='details'>";
            echo "<li class='topic'>Selecciona</li>";
            $i=0;
            $pan = "SELECT pedidos.idUsuarios FROM pedidos";
            $res = mysqli_query( $conexion, $pan);
                while ($columna = mysqli_fetch_array( $res ))
                {
                  echo "<li>";
                  echo "<input type='radio' name='id' value='$i' required>";
                  echo "</li>";
                  $i++; 

                }
            echo "</ul>";
            echo "</div>";
            
            echo "<div class='button'>";
            $i=0;
            $pan = "SELECT pedidos.idProyectos FROM pedidos";
            $res = mysqli_query( $conexion, $pan);
                while ($columna = mysqli_fetch_array( $res )){
                  echo "<input type='hidden' name='proy"."$i' value='$columna[0]'>";
                  echo "<input type='hidden' name='up' value='dash'>";
                  $i++;
                }
            echo "<a href='dash.php'><input type='hidden' name='up' value='dash'>";
            echo "<input type='submit' class='sb' value='Modificar'></a>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            
            /*-----------------------------*/

          }else{
            if($edit == "piezas"){
              echo "<div class='recent-sales box'>";
              echo "<div class='title'>Piezas utilizadas</div>";
              echo "<form method='post' action='up.php'>";
              echo "<div class='sales-details'>";
              echo "<ul class='details'>";
              echo "<li class='topic'>Id Producto</li>";
              $prod1 = "SELECT idPiezas FROM piezas";
              $resultado = mysqli_query( $conexion, $prod1) or die ( "Algo ha ido mal en la consulta a la base de datos");
              while ($columna = mysqli_fetch_array( $resultado )){
                echo "<li>" . $columna['0'] . "</li>";
              }
              echo "</ul>";
              echo "<ul class='details'>";
              echo "<li class='topic'>Tipo</li>";
              $i=0;
              $prod2 = "SELECT tipo FROM piezas";
              $resultado = mysqli_query( $conexion, $prod2) or die ( "Algo ha ido mal en la consulta a la base de datos");
              while ($columna = mysqli_fetch_array( $resultado )){
                echo "<li>";
                echo "<input type='text' name='tipo"."$i'' value='$columna[0]'>";
                echo "</li>";
                $i++;
              }
              echo "</ul>";
              echo "<ul class='details'>";
              echo "<li class='topic'>Material</li>";
              $i=0;
              $prod3 = "SELECT material FROM piezas";
              $resultado = mysqli_query( $conexion, $prod3) or die ( "Algo ha ido mal en la consulta a la base de datos");
              while ($columna = mysqli_fetch_array( $resultado )){
                echo "<li>";
                echo "<input type='text' name='material"."$i'' value='$columna[0]'>";
                echo "</li>";
                $i++;
              }
              echo "</ul>";
              echo "<ul class='details'>";
            echo "<li class='topic'>Selecciona</li>";
            $i=0;
            $pan = "SELECT idPiezas FROM piezas";
            $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $res ))
                {
                  echo "<li>";
                  echo "<input type='radio' name='id' value='$i' required>";
                  echo "</li>"; 
                  $i++;
                }
            echo "</ul>";
            echo "</div>";
            echo "<div class='button'>";
            $i=0;
            $pan = "SELECT idPiezas FROM piezas";
            $res = mysqli_query( $conexion, $pan);
                while ($columna = mysqli_fetch_array( $res )){
                  echo "<input type='hidden' name='proy"."$i' value='$columna[0]'>";
                  echo "<input type='hidden' name='up' value='dash'>";
                  $i++;
                }
            echo "<a href='dash.php'><input type='hidden' name='up' value='piezas'>";
            echo "<input type='submit' class='sb' value='Modificar'></a>";
            echo "</form>";
            echo "</div>";
              echo "</div>";
              echo "</div>";
            }else{
              if($edit == "prod"){
                echo "<div class='recent-sales box'>";
                echo "<div class='title'>Productos</div>";
                echo "<form method='post' action='up.php'>";
                echo "<div class='sales-details'>";
                echo "<ul class='details'>";
                echo "<li class='topic'>Id Producto</li>";
                $prod1 = "SELECT IdProductos FROM productos";
                $resultado = mysqli_query( $conexion, $prod1) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $resultado )){
                  echo "<li>" . $columna['0'] . "</li>";
                }
                echo "</ul>";
                echo "<ul class='details'>";
                echo "<li class='topic'>Nombre</li>";
                $i=0;
                $prod2 = "SELECT tipo FROM productos";
                $resultado = mysqli_query( $conexion, $prod2) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $resultado )){
                  echo "<li>";
                  echo "<input type='text' name='tipo"."$i' value='$columna[0]'>";
                  echo "</li>";
                  $i++;
                }
                echo "</ul>";
                echo "<ul class='details'>";
                echo "<li class='topic'>Precio</li>";
                $i=0;
                $prod3 = "SELECT precio FROM productos";
                $resultado = mysqli_query( $conexion, $prod3) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $resultado )){
                  echo "<li>";
                  echo "<input type='text' name='precio"."$i' value='$columna[0]'>€";
                  echo "</li>";
                  $i++;
                }
                echo "</ul>";
                echo "<ul class='details'>";
                echo "<li class='topic'>Cantidad</li>";
                $i=0;
                $prod4 = "SELECT cantidad FROM productos";
                $resultado = mysqli_query( $conexion, $prod4) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $resultado )){
                  echo "<li>";
                  echo "<input type='text' name='cantidad"."$i'value='$columna[0]'>";
                  echo "</li>";
                  $i++;
                }
                echo "</ul>";
                echo "<ul class='details'>";
            echo "<li class='topic'>Selecciona</li>";
            $pan = "SELECT IdProductos FROM productos";
            $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $res ))
                {
                  echo "<li>";
                  echo "<input type='radio' name='id' value='$columna[0]'required>";
                  echo "</li>"; 

                }
            echo "</ul>";
            echo "</div>";
            echo "<div class='button'>";
            echo "<input type='hidden' name='up' value='piezas'>";
            echo "<a href='dash.php'><input type='hidden' name='up' value='piezas'>";
            echo "<input type='submit' class='sb' value='Modificar'></a>";
            echo "</form>";
            echo "</div>";
                echo "</div>";
                echo "</div>";
              }else{

                /*-------------------------*/

                if($edit == "proyectos"){
                  echo "<div class='recent-sales box'>";
                  echo "<div class='title'>Proyectos</div>";
                  echo "<form method='post' action='up.php'>";
                  echo "<div class='sales-details'>";
                  echo "<ul class='details'>";
                  echo "<li class='topic'>Id Proyecto</li>";
                  $prod1 = "SELECT IdProyectos FROM proyectos";
                  $resultado = mysqli_query( $conexion, $prod1) or die ( "Algo ha ido mal en la consulta a la base de datos");
                  while ($columna = mysqli_fetch_array( $resultado )){
                    echo "<li>" . $columna['0'] . "</li>";
                  }
                  echo "</ul>";
                  echo "<ul class='details'>";
                  echo "<li class='topic'>Estado</li>";
                  $i=0;
                  $prod2 = "SELECT estado FROM proyectos";
                  $resultado = mysqli_query( $conexion, $prod2) or die ( "Algo ha ido mal en la consulta a la base de datos");
                  while ($columna = mysqli_fetch_array( $resultado )){
                    echo "<li>";
                    echo "<input type='text' name='estado"."$i' value='$columna[0]'>";
                    echo "</li>";
                    $i++;
                  }
                  echo "</ul>";
                  echo "<ul class='details'>";
                  echo "<li class='topic'>Tiempo Estimado</li>";
                  $i=0;
                  $prod3 = "SELECT tiempo_estimado FROM proyectos";
                  $resultado = mysqli_query( $conexion, $prod3) or die ( "Algo ha ido mal en la consulta a la base de datos");
                  while ($columna = mysqli_fetch_array( $resultado )){
                    echo "<li>";
                    echo "<input type='text' name='tiempo"."$i' value='$columna[0]'>dias";
                    echo "</li>";
                    $i++;
                  }
                  echo "</ul>";
                  echo "<ul class='details'>";
                  echo "<li class='topic'>Trabajador</li>";
                  $i=0;
                  $prod4 = "SELECT nombre FROM trabajadores, proyectos_trabajadores WHERE trabajadores.idTrabajadores = proyectos_trabajadores.idTrabajadores;";
                  $resultado = mysqli_query( $conexion, $prod4) or die ( "Algo ha ido mal en la consulta a la base de datos");
                  while ($columna = mysqli_fetch_array( $resultado )){
                    echo "<li>";
                    echo "<input type='text' name='trab"."$i' value='$columna[0]'>";
                    echo "</li>";
                    $i++;
                  }
                  echo "</ul>";
                  echo "<ul class='details'>";
                  echo "<li class='topic'>Selecciona</li>";
                  $i=0;
                  $pan = "SELECT idProyectos FROM proyectos";
                  $res = mysqli_query( $conexion, $pan);
                      while ($columna = mysqli_fetch_array( $res ))
                      {
                        echo "<li>";
                        echo "<input type='radio' name='id' value='$i' required>";
                        echo "</li>";
                        $i++; 

                      }
                  echo "</ul>";
                  echo "</div>";
                  echo "<div class='button'>";
                  $i=0;
                  $pan = "SELECT idProyectos FROM proyectos";
                  $res = mysqli_query( $conexion, $pan);
                      while ($columna = mysqli_fetch_array( $res )){
                        echo "<input type='hidden' name='proy"."$i' value='$columna[0]'>";
                        echo "<input type='hidden' name='up' value='dash'>";
                        $i++;
                      }
                  echo "<a href='dash.php'><input type='hidden' name='up' value='proyectos'>";
                  echo "<input type='submit' class='sb' value='Modificar'></a>";
                  echo "</form>";
                  echo "</div>";
                  echo "</div>";
                }else{
                  if($edit == "trab"){
                    echo "<div class='recent-sales box'>";
                    echo "<div class='title'>Ventas recientes</div>";
                    echo "<div class='sales-details'>";
                    echo "<ul class='details'>";
                    echo "<li class='topic'>Id Trabajador</li>";
                    $prod1 = "SELECT IdTrabajadores FROM trabajadores";
                    $resultado = mysqli_query( $conexion, $prod1) or die ( "Algo ha ido mal en la consulta a la base de datos");
                    while ($columna = mysqli_fetch_array( $resultado )){
                      echo "<li>" . $columna['0'] . "</li>";
                    }
                    echo "</ul>";
                    echo "<ul class='details'>";
                    if($usuario == "id18843915_root"){
                      echo "<li class='topic'>Nombre</li>";
                      $prod2 = "SELECT nombre FROM trabajadores";
                      $resultado = mysqli_query( $conexion, $prod2) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      while ($columna = mysqli_fetch_array( $resultado )){
                        echo "<li>";
                        echo "<input type='text' value='$columna[0]'>";
                        echo "</li>";
                      }
  
  
                      echo "</ul>";
                      echo "<ul class='details'>";
  
  
                      echo "<li class='topic'>Correo electrónico</li>";
                      $prod3 = "SELECT correo FROM trabajadores";
                      $resultado = mysqli_query( $conexion, $prod3) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      while ($columna = mysqli_fetch_array( $resultado )){
                        echo "<li>";
                        echo "<input type='text' value='$columna[0]'>";
                        echo "</li>";
                      }
  
  
                      echo "</ul>";
                      echo "<ul class='details'>";
  
  
                      echo "<li class='topic'>Clave</li>";
                      $prod4 = "SELECT clave FROM trabajadores";
                      $resultado = mysqli_query( $conexion, $prod4) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      while ($columna = mysqli_fetch_array( $resultado )){
                        echo "<li>";
                        echo "<input type='text' value='$columna[0]'>";
                        echo "</li>";
                      }
  
  
                      echo "</ul>";
                      echo "</div>";
                      echo "</div>";
                    }else{
                      echo "<li class='topic'>Nombre</li>";
                      $prod2 = "SELECT nombre FROM trabajadores";
                      $resultado = mysqli_query( $conexion, $prod2) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      while ($columna = mysqli_fetch_array( $resultado )){
                        if($columna[0] == $usuario){
                          echo "<li>";
                          echo "<input type='text' value='$columna[0]'>";
                          echo "</li>";
                        }else{
                          echo "<li>" . $columna['0'] . "</li>";
                        }
                      }
                      echo "</ul>";
                      echo "<ul class='details'>";
  
  
                      echo "<li class='topic'>Correo electrónico</li>";
                      $prod3 = "SELECT correo, nombre FROM trabajadores";
                      $resultado = mysqli_query( $conexion, $prod3) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      while ($columna = mysqli_fetch_array( $resultado )){
                        if($columna[1] == $usuario){
                          echo "<li>";
                          echo "<input type='text' value='$columna[0]'>";
                          echo "</li>";
                        }else{
                          echo "<li>" . $columna['0'] . "</li>";
                        }
                      }
  
  
                      echo "</ul>";
                      echo "<ul class='details'>";
  
  
                      echo "<li class='topic'>Clave</li>";
                      $prod4 = "SELECT clave, nombre FROM trabajadores";
                      $resultado = mysqli_query( $conexion, $prod4) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      while ($columna = mysqli_fetch_array( $resultado )){
                        if($columna[1] == $usuario){
                          echo "<li>";
                          echo "<input type='text' value='$columna[0]'>";
                          echo "</li>";
                        }else{
                          echo "<li>" . $columna['0'] . "</li>";
                        }
                      }
  
  
                      echo "</ul>";
                      echo "</div>";
                      echo "</div>";
                    }
                  }else{
                    if($edit == "usr"){
                      echo "<div class='recent-sales box'>";
                      echo "<div class='title'>Ventas recientes</div>";
                      echo "<div class='sales-details'>";
                      echo "<ul class='details'>";
                      echo "<li class='topic'>Nombre</li>";
                      $prod2 = "SELECT nombre FROM usuarios";
                      $resultado = mysqli_query( $conexion, $prod2) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      while ($columna = mysqli_fetch_array( $resultado )){
                        echo "<li>";
                        echo "<input type='text' value='$columna[0]'>";
                        echo "</li>";
                      }
                      echo "</ul>";
                      echo "<ul class='details'>";
                      echo "<li class='topic'>Correo electrónico</li>";
                      $prod3 = "SELECT email FROM usuarios";
                      $resultado = mysqli_query( $conexion, $prod3) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      while ($columna = mysqli_fetch_array( $resultado )){
                        echo "<li>";
                        echo "<input type='text' value='$columna[0]'>";
                        echo "</li>";
                      }
                      echo "</ul>";
                      echo "<ul class='details'>";
                      echo "<li class='topic'>Teléfono</li>";
                      $prod4 = "SELECT telefono FROM usuarios";
                      $resultado = mysqli_query( $conexion, $prod4) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      while ($columna = mysqli_fetch_array( $resultado )){
                        echo "<li>";
                        echo "<input type='text' value='$columna[0]'>";
                        echo "</li>";
                      }
                      echo "</ul>";
                      echo "<ul class='details'>";
                      echo "<li class='topic'>Dirección</li>";
                      $prod4 = "SELECT direccion FROM usuarios";
                      $resultado = mysqli_query( $conexion, $prod4) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      while ($columna = mysqli_fetch_array( $resultado )){
                        echo "<li>";
                        echo "<input type='text' value='$columna[0]'>";
                        echo "</li>";
                      }
                      echo "</ul>";
                      echo "<ul class='details'>";
                      echo "<li class='topic'>Activo</li>";
                      $prod4 = "SELECT activo FROM usuarios";
                      $resultado = mysqli_query( $conexion, $prod4) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      while ($columna = mysqli_fetch_array( $resultado )){
                      if($columna[0]==1){
                        echo "<li>";
                        echo "<input type='checkbox' value='1' checked>";
                        echo "</li>";
                      }else{
                        echo "<li>";
                        echo "<input type='checkbox' value='0'>";
                        echo "</li>";
                      }
            }
                      echo "</ul>";
                      echo "<ul class='details'>";
                      echo "<li class='topic'>Selecciona</li>";
                      $i=0;
                      $pan = "SELECT pedidos.idUsuarios FROM pedidos";
                      $res = mysqli_query( $conexion, $pan);
                          while ($columna = mysqli_fetch_array( $res ))
                          {
                            echo "<li>";
                            echo "<input type='radio' name='id' value='$i' required>";
                            echo "</li>";
                            $i++; 

                          }
                      echo "</ul>";
                      echo "</div>";
                      echo "<div class='button'>";
                      $i=0;
                      $pan = "SELECT pedidos.idProyectos FROM pedidos";
                      $res = mysqli_query( $conexion, $pan);
                          while ($columna = mysqli_fetch_array( $res )){
                            echo "<input type='hidden' name='proy"."$i' value='$columna[0]'>";
                            echo "<input type='hidden' name='up' value='dash'>";
                            $i++;
                          }
                      echo "<a href='dash.php'><input type='hidden' name='up' value='dash'>";
                      echo "<input type='submit' class='sb' value='Modificar'></a>";
                      echo "</form>";
                      echo "</div>";
                      echo "</div>";
                    }
          }
            }
              }
                }
                  }
        ?>
      </div>
    </div>
    <div class="home-content">
    <div class="sales-boxes">
    <?php
    if($edit == "dash"){
      echo "<div class='recent-sales box'>";
      echo "<div class='title'>Ventas recientes</div>"; 
      echo "<form method='post' action='up.php'>";
      echo "<div class='sales-details'>";
      echo "<ul class='details'>";
      echo "<li class='topic'>Id Usuario</li>";
            echo "<li>";
            echo "<input type='text' name= 'id' required>";
            echo "</li>";
      echo "</ul>";
      echo "<ul class='details'>";
      echo "<li class='topic'>Estado</li>";
            echo "<li>";
            echo "<input type='text' name= 'estado' required>";
            echo "</li>";
      echo "</ul>";
      echo "<ul class='details'>";
      echo "<li class='topic'>Tiempo Estimado</li>";
              echo "<li>";
              echo "<input type='text' name='tiempo' required>dias";
              echo "</li>";
      echo "</ul>";
      echo "<ul class='details'>";
      echo "<li class='topic'>Total</li>";
            echo "<li>";
            echo "<input type='text' name= 'total' required>";
            echo "</li>";
      echo "</ul>";
      echo "</div>";
      echo "<div class='button'>";
      echo "<a href='dash.php'><input type='hidden' name='up' value='dash'>";
      echo "<input type='submit' class='sb' value='Añadir'></a>";
      echo "</form>";
      echo "</div>";
      echo "</div>";
    }
    ?>
  </section>
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
</body>
</html>