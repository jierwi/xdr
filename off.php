<?php
    session_start();
    session_destroy();
    setcookie('carr', 0);
			header('location: index.php');
?>