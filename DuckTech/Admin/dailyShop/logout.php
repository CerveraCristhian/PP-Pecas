<?php
    session_start();
    unset($_SESSION['usuarioWeb']);
    unset($_SESSION['usuario']);
    session_unset();
    session_destroy();

    header("Location: ../../web/Intensely/index.html");
    die("Adiós");
?>