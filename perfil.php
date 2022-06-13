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

           $u = "SELECT nombre,contrasenya FROM usuarios WHERE nombre='$value'";
           $resultado = mysqli_query( $conexion, $u);
           while ($columna = mysqli_fetch_array( $resultado )){
            $si=$columna[0];
           }

           if($si==NULL){
            header('location:index.html');
           }
          $us = "SELECT idUsuarios FROM usuarios WHERE nombre = '$value'";
          $resultado = mysqli_query( $conexion, $us);
          while ($columna = mysqli_fetch_array( $resultado )){
           $usr=$columna[0];
          }
          $ben = "SELECT SUM(precio_total) FROM pedidos WHERE idUsuarios = '$usr' ";
          $resultado = mysqli_query( $conexion, $ben);
          while ($columna = mysqli_fetch_array( $resultado )){
           $ben=$columna[0];
          }
          $ven = "SELECT COUNT(idPedidos) FROM pedidos WHERE idUsuarios = '$usr'";
          $resultado = mysqli_query( $conexion, $ven);
          while ($columna = mysqli_fetch_array( $resultado )){
           $ven=$columna[0];
          }
          $pan = "SELECT nombre FROM usuarios WHERE idUsuarios = '$usr'";
          $res = mysqli_query( $conexion, $pan);
          ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_e_4.0.css">
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
          <a href="panel_u.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Panel de usuario</span>
          </a>
        </li>
        <li>
          <a href="perfil.php" class="active">
          <i class='bx bx-user'></i>
            <span class="links_name">Perfil</span>
          </a>
        </li>
        <li>
          <a href="carrito.php">
          <i class='bx bx-basket'></i>
            <span class="links_name">Carrito</span>
          </a>
        </li>
        <li>
          <a href="index.php">
          <i class='bx bx-home'></i>
            <span class="links_name">Índice</span>
          </a>
        </li>
        <li class="log_out">
          <a href="off.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Cerrar sesión</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Perfil</span>
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
            <?php
            echo "<div class='home-content'>";
            echo "<div class='sales-boxes'>";
            echo "<div class='recent-sales box'>";
            echo "<div class='title'>Datos personales</div>"; 
            echo "<div class='sales-details'>";
            echo "<form method='post' action='ppp.php'>";
            echo "<div class='sales-details'>";
            echo "<ul class='details'>";
            echo "<li class='topic'>Nombre</li>";
            while ($columna = mysqli_fetch_array( $res ))
                {
                  echo "<li>";
                  echo "<input type='text' name='nombre' value='$columna[0]'>";
                  echo "</li>";
                }
            echo "</ul>";
            
            echo "</div>";
            echo "<div class='sales-details'>";
            echo "<ul class='details'>";
                echo "<li class='topic'>Correo</li>";
                $pan = "SELECT email FROM usuarios WHERE idUsuarios = '$usr'";
                $res = mysqli_query( $conexion, $pan);
                while ($columna = mysqli_fetch_array( $res ))
                    {
                      echo "<li>";
                      echo "<input type='text' name='email' value='$columna[0]'>";
                      echo "</li>";
                    }
            echo "</ul>";
            echo "</div>";
            echo "</div>";
            echo "<div class='sales-details'>";
            echo "<ul class='details'>";
                  echo "<li class='topic'>Teléfono</li>";
                  $pan = "SELECT telefono FROM usuarios WHERE idUsuarios = '$usr'";
                  $res = mysqli_query( $conexion, $pan);
                  while ($columna = mysqli_fetch_array( $res ))
                      {
                        echo "<li>";
                        echo "<input type='tel' name='tel' value='$columna[0]'>";
                        echo "</li>";
                      }
            echo "</ul>";
            echo "</div>";
            echo "<div class='sales-details'>";
            echo "<ul class='details'>";
            echo "<li class='topic'>Dirección</li>";
            $pan = "SELECT direccion FROM usuarios WHERE idUsuarios = '$usr'";
            $res = mysqli_query( $conexion, $pan);
            while ($columna = mysqli_fetch_array( $res ))
                  {
                    echo "<li>";
                    echo "<input type='text' name='direc' value='$columna[0]'>";
                    echo "</li>";
                  }
            echo "</ul>";
            echo "</div>";
            echo "<div class='sales-details'>";
            echo "<ul class='details'>";
            echo "<li class='topic'>DNI</li>";
            $pan = "SELECT dni FROM usuarios WHERE idUsuarios = '$usr'";
            $res = mysqli_query( $conexion, $pan);
            while ($columna = mysqli_fetch_array( $res ))
                  {
                    echo "<li>";
                    echo "<input type='text' name='dni' value='$columna[0]'>";
                    echo "</li>";
                  }
            echo "</ul>";
            echo "</div>";
            echo "<div class='sales-details'>";
            echo "<ul class='details'>";
            echo "<li class='topic'>Tarjeta de crédito</li>";
            $pan = "SELECT tarjeta FROM usuarios WHERE idUsuarios = '$usr'";
            $res = mysqli_query( $conexion, $pan);
            while ($columna = mysqli_fetch_array( $res ))
                  {
                    echo "<li>";
                    echo "<input type='text' name='tarj' value='$columna[0]'>";
                    echo "</li>";
                  }
            echo "</ul>";
            echo "</div>";
            echo "<div class='sales-details'>";
            echo "<ul class='details'>";
            echo "<li class='topic'>Fecha de nacimiento</li>";
            $pan = "SELECT fecha_nac FROM usuarios WHERE idUsuarios = '$usr'";
            $res = mysqli_query( $conexion, $pan);
            while ($columna = mysqli_fetch_array( $res ))
                  {
                    echo "<li>";
                    echo "<input type='date' name='fech' value='$columna[0]'>";
                    echo "</li>";
                  }
            echo "</ul>";
            echo "</div>";
            echo "<div class='sales-details'>";
            echo "<ul class='details'>";
            echo "<div class='button'>";
            echo "<a href='dash.php'><input type='hidden' name='edit' value='dash'>";
            echo "<input type='submit' class='sb' value='Guardar cambios'></a>";
            echo "</div>";
            echo "</ul>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
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