<?php
    session_start();
    session_destroy();
    header("Location: ../pages/MenuPrincipal.php");
    exit;
?>