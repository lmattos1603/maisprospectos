<?php
session_start();
require_once("../../models/Usuario.php");
require_once("../../controllers/Prospect/prospectController.php");
    use controllers\ControllerProspect;
    use models\Usuario;
    
    if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bem Vindo ao Sistema</title>
        <link rel="stylesheet" type="text/css" href="../../libs/bootstrap/css/bootstrap.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="textoNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../main.php">Home <span class="sr-only">(Página atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Prospect/v_listar_prospect.php">Cadastrar Prospects</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Bem vindo: <?php $usuario = unserialize($_SESSION['usuario']);
                    echo $usuario->nome;
                    ?>
                </span>
                <a class="nav-link" href="../../controllers/controller_logout.php">Sair</a>
            </div>
        </nav>
        </header>
        <div class="container">
            <form class="form-signin" action="../../controllers/Prospect/c_incluir_prospect.php" method="POST">
                <div>
                    <h5 class="form-signin-heading">Cadastro de Prospects:</h5>
                </div class="">
                <div class="form-group">
                <label for="nome">Nome:</label>
                    <input name="nome" id="nome" type="text" placeholder="Digite seu nome" autofocus class="form-control" required/>
                    <label for="cpf">CPF:</label>
                    <input name="cpf" id="cpf" type="text" placeholder="Digite seu CPF" autofocus class="form-control" required/>
                    <label for="email">E-mail:</label>
                    <input name="email" id="email" type="text" placeholder="Digite seu e-mail" autofocus class="form-control" required/>
                    <label for="telefone">Telefone:</label>
                    <input name="telefone" id="telefone" type="text" placeholder="Digite seu telefone" autofocus class="form-control" required/>
                    <label for="whatsapp">Whatsapp:</label>
                    <input name="whatsapp" id="whatsapp" type="text" placeholder="Digite seu telefone Whatsapp" autofocus class="form-control" required/>
                    <label for="facebook">Facebook:</label>
                    <input name="facebook" id="facebook" type="text" placeholder="Digite seu usuário do Facebook" autofocus class="form-control" required/>
                    <label for="rua">Rua:</label>
                    <input name="rua" id="rua" type="text" placeholder="Digite seu endereço" autofocus class="form-control" required/>
                    <label for="numero">Número:</label>
                    <input name="numero" id="numero" type="text"  autofocus class="form-control" required/>
                    <label for="bairro">Bairro:</label>
                    <input name="bairro" id="bairro" type="text"  autofocus class="form-control" required/>
                    <label for="cidade">Cidade:</label>
                    <input name="cidade" id="cidade" type="text"  autofocus class="form-control" required/>
                    <label for="estado">Estado:</label>
                    <input name="estado" id="estado" type="text"  autofocus class="form-control" required/>
                    <label for="cep">CEP:</label>
                    <input name="cep" id="cep" type="text"  autofocus class="form-control" required/>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="v_listar_prospect.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </body>
</html>
<?php
    }else{
        $_SESSION['erroLogin'] = "Por favor, faça login com seu usuário e senha!";
        header("Location: ../../index.php");
    }
?>