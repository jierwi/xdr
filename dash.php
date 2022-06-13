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

           $alm = "SELECT SUM(precio) FROM productos";
           $resultado = mysqli_query( $conexion, $alm) or die ( "Algo ha ido mal en la consulta a la base de datos");
           while ($columna = mysqli_fetch_array( $resultado )){
            $alm=$columna[0];
           }
           $ben = "SELECT SUM(precio_total) FROM pedidos";
           $resultado = mysqli_query( $conexion, $ben) or die ( "Algo ha ido mal en la consulta a la base de datos");
           while ($columna = mysqli_fetch_array( $resultado )){
            $ben=$columna[0];
           }
           $ord = "SELECT COUNT(idProyectos) FROM proyectos";
           $resultado = mysqli_query( $conexion, $ord) or die ( "Algo ha ido mal en la consulta a la base de datos");
           while ($columna = mysqli_fetch_array( $resultado )){
            $ord_t=$columna[0];
           }
           $ven = "SELECT COUNT(idPedidos) FROM pedidos";
           $resultado = mysqli_query( $conexion, $ven) or die ( "Algo ha ido mal en la consulta a la base de datos");
           while ($columna = mysqli_fetch_array( $resultado )){
            $ven=$columna[0];
           }
           $pan = "SELECT pedidos.idUsuarios FROM pedidos";
           $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");
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
          <a href="dash.php" class="active">
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
          <a href="piezas.php">
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
        <span class="dashboard">Administración</span>
      </div><div class="search-box">
        
      
      </div>
      <div class="search-box">
        <a href="dash.php"><i class='bx bx-revision' ></i></a>
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
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Ordenes totales</div>
            <div class="number"><?php echo $ord_t ?></div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Ventas totales</div>
            <div class="number"><?php echo $ven?></div>
           </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Beneficio total</div>
            <div class="number"><?php echo $ben ?>€</div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Almacén</div>
            <div class="number"><?php echo $alm ?>€</div>
           </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Ventas recientes</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Id Usuario</li>
              <?php 
                while ($columna = mysqli_fetch_array( $res ))
                {
                    echo "<li>" . $columna['0'] . "</li>";

                }
              ?>
            </ul>
            <ul class="details">
            <li class="topic">Estado</li>
            <?php
            $pan = "SELECT proyectos.estado FROM proyectos";
            $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $res ))
                {
                    echo "<li>" . $columna['0'] . "</li>";

                }
              ?>
          </ul>
          <ul class="details">
            <li class="topic">Tiempo Estimado</li>
            <?php
            $pan = "SELECT proyectos.tiempo_estimado FROM proyectos ";
            $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $res ))
                {
                    echo "<li>" . $columna['0'] . " dias" .   "</li>";
                    
                }
              ?>
          </ul>
          <ul class="details">
            <li class="topic">Total</li>
            <?php
            $pan = "SELECT pedidos.precio_total FROM pedidos";
            $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $res ))
                {
                    echo "<li>" . $columna['0'] . "€" . "</li>";

                }
              ?>
          </ul>
          </div>

          <div class="button">
            <form method="post" action="edit.php">
              <input type="hidden" name="edit" value="dash">
              <a href="dash.php"><input type="hidden" name="edit" value="dash">
              <input type="submit" class="sb" value="Editar"></a>
            </form>
          </div>

        </div>
        <div class="top-sales box">
          <div class="title">Todos los productos</div>
          <ul class="top-sales-details">
          <?php
            $pro = "SELECT tipo, cantidad FROM productos";
            $resp = mysqli_query( $conexion, $pro) or die ( "Algo ha ido mal en la consulta a la base de datos");
                while ($columna = mysqli_fetch_array( $resp ))
                {
                    echo "<li>";
                    echo "<span class='product'>" . $columna['0'] . "</span>";
                    echo "<span class='price'>" . $columna['1']  . " unidades" . "</span>";
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