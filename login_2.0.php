<?php 
$error=$_COOKIE['error'];
$cod=$_COOKIE['cod'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_9.1.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Responsive Navigation Menu Bar</title>
</head>
<body>
    <nav>
        <div class="nav-bar"> 
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><a href="index.html">XDR</a></span>

            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="index.html">XDR</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>
                <ul class="nav-links">
                    <li><a href="login_2.0.html">Login / Registro</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="login_2.0_work.html">Trabajadores</a></li>
                </ul>
            </div>
            <div class="darkLight-searchBox">

          </div>
          <div class="searchBox">
              <div class="searchToggle">
               <i class='bx bx-x cancel'></i>
               <i class='bx bx-search search'></i>
              </div>
          </div>
        </div>
    </nav>
    <script src="script1.js"></script>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
          <div class="front">
            <img src="images/logo_n_f.png" alt="">
          </div>
          <div class="back">
            <img class="backImg" src="images/logo_n_f.png" alt="">
          </div>
        </div>
          <?php
            if($cod == 1){
              echo "<div class='forms'>";
              echo "<div class='form-content'>";
              echo "<div class='login-form'>";
              echo "<div class='title'>Inicia Sesión</div>";
              echo "<form method='post' action='ini.php'>";
              echo "<div class='input-boxes'>";
              echo "<div class='input-box'>";
              echo "<i class='fas fa-envelope'></i>";
              echo "<input type='text' name='nombre' placeholder='Introduce tu nombre' required>";
              echo "</div>";
              echo "<div class='input-box'>";
              echo "<i class='fas fa-lock'></i>";
              echo "<input type='password' name='contra' placeholder='Introduce tu contraseña' required>";
              echo "</div>";
              echo "<div class='button input-box'>";
              echo "<input type='submit' value='Inicia Sesión'>";
              echo "</div>";
              echo "<div class='text sign-up-text'>Aún no tienes una cuenta? <label for='flip'>Regístrate</label></div>";
              echo "<div class='error'>";
              echo "<p>$error</p>";
              echo "</div>";
              echo "</div>";
              echo "</form>";
            }else{
              echo "<div class='forms'>";
              echo "<div class='form-content'>";
              echo "<div class='login-form'>";
              echo "<div class='title'>Inicia Sesión</div>";
              echo "<form method='post' action='ini.php'>";
              echo "<div class='input-boxes'>";
              echo "<div class='input-box'>";
              echo "<i class='fas fa-envelope'></i>";
              echo "<input type='text' name='nombre' placeholder='Introduce tu nombre' required>";
              echo "</div>";
              echo "<div class='input-box'>";
              echo "<i class='fas fa-lock'></i>";
              echo "<input type='password' name='contra' placeholder='Introduce tu contraseña' required>";
              echo "</div>";
              echo "<div class='button input-box'>";
              echo "<input type='submit' value='Inicia Sesión'>";
              echo "</div>";
              echo "<div class='text sign-up-text'>Aún no tienes una cuenta? <label for='flip'>Regístrate</label></div>";
              echo "<div class='error1'>";
              echo "<p>$error</p>";
              echo "</div>";
              echo "</div>";
              echo "</form>";
            }
          ?>
          </div>
            <div class="signup-form">
              <div class="title">Regístrate</div>
            <form method="post" action="reg_2.0.php">
                <div class="input-boxes">
                  <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nombre" placeholder="Introduce tu nombre *" required>
                  </div>
                  <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="correo" placeholder="Introduce tu correo *" required>
                  </div>
                  <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="contra" placeholder="Introduce tu contraseña *" required>
                  </div>
                  <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="contra1" placeholder="Vuelve a introducir tu contraseña *" required>
                  </div>
                  <input type="checkbox" required > Aceptar los términos y condiciones
                  <div class="button input-box">
                    <input type="submit" value="Regístrate">
                  </div>
                  <div class="text sign-up-text">Tienes ya una cuenta? <label for="flip">Inicia Sesión</label></div>
                </div>
          </form>
        </div>
        </div>
        </div>
      </div>
      <script src="j/script1.js"></script>
</body>
</html>