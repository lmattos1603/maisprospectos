<?php
    session_start();
    require_once('Usuario/usuarioController.php');
    use controllers\ControllerUsuario;

    if(isset($_POST['login']) && isset($_POST['senha'])){
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        
        $ctrlUsuario = new ControllerUsuario();
        $usuario = $ctrlUsuario->fazerLogin($login, $senha);

        if($usuario->logado){
            $_SESSION['usuario'] = serialize($usuario);
            header("Location: ../views/main.php");
        }else{
            $_SESSION['erroLogin'] = "Usuário ou senha incorretos! Tente novamente.";
            header("Location: ../index.php");
        }
    }else{
        $_SESSION['erroLogin'] = "Por favor, faça login com seu usuário e senha!";
        header("Location: ../index.php");
    }
    
?>