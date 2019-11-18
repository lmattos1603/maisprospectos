<?php
session_start();

    if(isset($_SESSION['usuario'])){
        unset($_SESSION['usuario']);

        $_SESSION['logout'] = "Sessão encerrada com sucesso!";
        header("Location: ../index.php");
    }
?>