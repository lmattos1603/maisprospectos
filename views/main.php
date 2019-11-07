<?php
    session_start();
    require_once("../models/Usuario.php");
    use models\Usuario;
    
    if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bem Vindo ao Sistema</title>
        <link rel="stylesheet" type="text/css" href="../libs/bootstrap/css/bootstrap.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="textoNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(Página atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cadastrar Prospects</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Bem vindo: <?php $usuario = unserialize($_SESSION['usuario']);
                    echo $usuario->nome;
                    ?>
                </span>
            </div>
        </nav>
        </header>

    </body>
</html>
<?php
    }else{
        $_SESSION['erroLogin'] = "Por favor, faça login com seu usuário e senha!";
        header("Location: ../index.php");
    }
?>