<?php
if((isset($_COOKIE['carr']))==false){
    setcookie('carr', 0);
}

session_start();
if((isset($_SESSION['nom']))==true){
    $value = $_SESSION['nom'];
    $value1 = $_SESSION['cont'];
}
    
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
    <link rel="stylesheet" href="style_9.3?1.0.css">
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
                <?php    
                if((isset($_SESSION['nom']))==true){
                    echo "<li><a href='productos2.0.php'>Productos</a></li>";
                    echo "<li><a href='panel_u.php'>Panel de usuario</a></li>";
                    echo "<li><a href='perfil.php'>Perfil</a></li>";
                    echo "<li><a href='off.php'>Cerrar sesión</a></li>";
                }else{
                    echo "<li><a href='login_2.0.html'>Login / Registro</a></li>";
                    echo "<li><a href='productos.php'>Productos</a></li>";
                    echo "<li><a href='login_2.0_work.html'>Trabajadores</a></li>";
                }
                ?>
                </ul>
            </div>
            <div class="darkLight-searchBox">

            </div>
            <?php
            if((isset($_SESSION['nom']))==true){
                echo"<div class='darkLight-searchBox'>";
                echo"<a href='carrito.php'>";    
            echo"<div class='dark-light'>";
            echo"<i class='bx bx-cart'></i>";
            $carr=$_COOKIE['carr'];
                        echo "<p class='carr'>$carr</p>";
                        echo"</div>";
                echo"</a>";
            echo"</div>";
            }
            
            ?>
            <div class="searchBox">
                <div class="searchToggle">
                 <i class='bx bx-x cancel'></i>
                 <i class='bx bx-search search'></i>
                </div>
            </div>
        </div>
    </nav>
    <section class="gallery" id="galeria">
        <h1 class="subtitulo"><b>Nuestros teclados</b></h1>
        <div class="contenedor-galeria">
            <img src="Images/60/60.png" class="img-galeria">
            <img src="Images/60e/60e.png" class="img-galeria">
            <img src="Images/50/50.png" class="img-galeria">
        </div>
</section>
    <script src="j/script1.js"></script>
</body>
</html> 