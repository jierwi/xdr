<?php
  $servidor = "localhost";
  $usuario = "id18843915_root";
  $contrasena = "19Ru18be17n*";
  $basededatos = "id18843915_mydb";

           $conexion = mysqli_connect( $servidor, $usuario, $contrasena);
           $db = mysqli_select_db( $conexion, $basededatos );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link rel="stylesheet" href="style_9.2?1.0.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><a href="index.php">XDR</a></span>
            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="index.php">XDR</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>
                <ul class="nav-links">
                <li><a href="productos2.0.php">Productos</a></li>
                    <li><a href="panel_u.php">Panel de usuario</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                    <li><a href="off.php">Cerrar sesión</a></li>
                </ul>
            </div>
            <div class="darkLight-searchBox">
            <a href="carrito.php">    
            <div class="dark-light">
                    <i class='bx bx-cart'></i>
                    <?php
                        $carr=$_COOKIE['carr'];
                        echo "<p class='carr'>$carr</p>"
                    ?>
                </div>
                </a>
            </div>
            <div class="searchBox">
                <div class="searchToggle">
                 <i class='bx bx-x cancel'></i>
                 <i class='bx bx-search search'></i>
                </div>
            </div>
        </div>
    </nav>
    
    <section>
    <div class="swiper mySwiper container">
      <div class="swiper-wrapper content">
<?php 
for($i=7;$i<=38;$i++){
  $pc = "SELECT precio,descripcion,imagen,tipo FROM productos WHERE idProductos=$i";
  $resultado = mysqli_query( $conexion, $pc);
  while ($columna = mysqli_fetch_array( $resultado )){
    $precio = $columna[0];
    $desc = $columna[1];
    $imagen = $columna[2];
    $nombre = $columna[3];
  }

  echo "<div class='swiper-slide card'>";
  echo "<div class='card-content'>";
  echo "<div class='image'>";
  echo "<img src='$imagen"."$nombre.png' alt='' >";
  echo "</div>";
  echo "<div class='name-profession'>";
  echo "<span class='name'>$desc</span>";
  echo "<span class='profession'>$precio €  </span>";
  echo "</div>";
  echo "<form method='post' action='carr.php'>";
  echo "<div class='button'>";
  echo "<input type='hidden' name='id' value='$nombre' >";
  echo "<button class='aboutMe'>Añadir al carrito</button>";
  echo "</div>";
  echo "</form>";
  echo "</div>";
  echo "</div>";

}
$pc = "SELECT precio,descripcion,imagen,tipo FROM productos WHERE idProductos=25";
$resultado = mysqli_query( $conexion, $pc);
while ($columna = mysqli_fetch_array( $resultado )){
  $precio = $columna[0];
  $desc = $columna[1];
  $imagen = $columna[2];
  $nombre = $columna[3];
}

echo "<div class='swiper-slide card'>";
echo "<div class='card-content'>";
echo "<div class='image'>";
echo "<img src='$imagen"."$nombre.png' alt='' >";
echo "</div>";
echo "<div class='name-profession'>";
echo "<span class='name'>$desc</span>";
echo "<span class='profession'>$precio €  </span>";
echo "</div>";
echo "<form method='post' action='carr.php'>";
echo "<div class='button'>";
echo "<button class='aboutMe'>Añadir al carrito</button>";
echo "</div>";
echo "</form>";
echo "</div>";
echo "</div>";
?>
      </div>
    </div>
    <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
  </section>


  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

</section>
    <script src="j/script1.js"></script>
</body>
</html> 