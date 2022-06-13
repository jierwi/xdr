<?php 
$cant = $_COOKIE['carr'];
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
            header('location:index.php');
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
          <a href="panel_u.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Panel de usuario</span>
          </a>
        </li>
        <li>
          <a href="perfil.php">
          <i class='bx bx-user'></i>
            <span class="links_name">Perfil</span>
          </a>
        </li>
        <li>
          <a href="carrito.php" class="active">
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
        <span class="dashboard">Carrito</span>
      </div>
      <div class="search-box">
        
      </div>
      <div class="search-box">
        <a href="carrito.php"><i class='bx bx-revision' ></i></a>
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
          <div class="title">Datos productos</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Id Producto</li>
              <?php 
                for($i=$cant;$i>0;$i--){
                    echo "<li>$i</li>";
                }
              ?>
            </ul>
            <ul class="details">
            <li class="topic">Descripción</li>
            <?php
                  for($i=$cant;$i>0;$i--){
                    $si=$_COOKIE[$i];
                      echo "<li>$si</li>";
                  }
              ?>
          </ul>
          <ul class="details">
            <li class="topic">Precio</li>
            <?php
            for($i=$cant;$i>0;$i--){
                    $pan = "SELECT precio FROM productos WHERE tipo = '$_COOKIE[$i]'";
                    $res = mysqli_query( $conexion, $pan) or die ( "Algo ha ido mal en la consulta a la base de datos");
                        while ($columna = mysqli_fetch_array( $res ))
                        {
                            echo "<li>" . $columna['0'] . " €</li>";
        
                        }
                      }
              ?>
          </ul>
          <ul class="details">
            <li class="topic">Editar</li>
            <?php
            for($i=$cant;$i>0;$i--){
            echo"<div class='button'>";
            echo"<input type='hidden' name='edit' value='dash'>";
            echo"<a href='dash.php'><input type='hidden' name='edit' value='dash'>";
            echo"<input type='submit' class='sb' value='Eliminar'></a>";
            echo"</div>";
            }
            ?>
          </ul>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Datos usuario</div>
          <ul class="top-sales-details">
          <?php
                    echo "<li>";
                    echo "<span class='product'>si</span>";
                    echo "<span class='price'>si</span>";
                    echo "</li>";
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