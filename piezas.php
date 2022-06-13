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
          <a href="dash.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Panel administración</span>
          </a>
        </li>
        <li>
          <a href="prod.php">
            <i class='bx bx-basket'></i>
            <span class="links_name">Productos</span>
          </a>
        </li>
        <li>
          <a href="piezas.php" class="active">
            <i class='bx bx-package'></i>
            <span class="links_name">Piezas</span>
          </a>
        </li>
        <li>
          <a href="proyectos.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Proyectos</span>
          </a>
        </li>
        <li>
          <a href="trab.php">
          <i class='bx bx-user-plus'></i>
            <span class="links_name">Trabajadores</span>
          </a>
        </li>
        <li>
          <a href="usr.php">
          <i class='bx bx-user'></i>
            <span class="links_name">Usuarios</span>
          </a>
        </li>
        <li>
          <a href="aj.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Ajustes</span>
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
        <span class="dashboard">Piezas</span>
      </div>
      <div class="search-box">
        
      </div>
      <div class="search-box">
        <a href="piezas.php"><i class='bx bx-revision' ></i></a>
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
        <div class="recent-sales box">
          <div class="title">Piezas</div>
          <div class="sales-details">
            <ul class="details">
            <li class="topic">Id Pieza</li>
            <?php
            $prod3 = "SELECT piezas.idPiezas FROM piezas";
            $resultado = mysqli_query( $conexion, $prod3) or die ( "Algo ha ido mal en la consulta a la base de datos");
            while ($columna = mysqli_fetch_array( $resultado )){
                echo "<li>" . $columna['0'] . "</li>";
            }
              ?>
          </ul>
          </ul>
          <ul class="details">
            <li class="topic">Tipo</li>
            <?php
            $prod3 = "SELECT tipo FROM piezas";
            $resultado = mysqli_query( $conexion, $prod3) or die ( "Algo ha ido mal en la consulta a la base de datos");
            while ($columna = mysqli_fetch_array( $resultado )){
                echo "<li>" . $columna['0'] . "</li>";
            }
              ?>
          </ul>
          <ul class="details">
            <li class="topic">Material</li>
            <?php
            $prod3 = "SELECT material FROM piezas";
            $resultado = mysqli_query( $conexion, $prod3) or die ( "Algo ha ido mal en la consulta a la base de datos");
            while ($columna = mysqli_fetch_array( $resultado )){
                echo "<li>" . $columna['0'] . "</li>";
            }
              ?>
          </ul>          
          </div>
          <div class="button">
            <form method="post" action="edit.php">
              <input type="hidden" name="edit" value="dash">
              <a href="piezas.php"><input type="hidden" name="edit" value="piezas">
              <input type="submit" class="sb" value="Editar"></a>
            </form>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Piezas utilizadas</div>
          <ul class="top-sales-details">
          <?php
            $prod2 = "SELECT idProductos, idPiezas FROM productos_piezas";
            $resultado = mysqli_query( $conexion, $prod2);
            while ($columna = mysqli_fetch_array( $resultado )){
              echo "<li>";
              echo "<span class='product'>" . $columna['0'] . "</span>";
              echo "<span class='price'>" . $columna['1']  .  "</span>";
              echo "</li>";
            }
              ?>
          </ul>
        </div>
      </div>
    </div>
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