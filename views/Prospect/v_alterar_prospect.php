<?php
session_start();
require_once("../../models/Usuario.php");
require_once("../../controllers/Prospect/prospectController.php");
    use controllers\ControllerProspect;
    use models\Usuario;
    
    if(isset($_SESSION['usuario'])){
        if(isset($_GET['email'])){
            $email = $_GET['email'];
            $ctrlProspect = new ControllerProspect();
            $arrayProspects = $ctrlProspect->buscarProspects($email);
            
            $prospect = $arrayProspects[0];
        }
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
                        <a class="nav-link" href="v_listar_prospect.php">Cadastrar Prospects</a>
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
            <form class="form-signin" action="../../controllers/Prospect/c_alterar_prospect.php" method="POST">
                <div>
                    <h5 class="form-signin-heading">Alterar Prospect:</h5>
                </div class="">
                <div class="form-group">
                <label for="id">Id:</label>
                <input name="id" id="id" type="text" value= <?php echo $prospect->id ?> class="form-control" required readonly/>
                    <label for="nome">Nome:</label>
                    <input name="nome" id="nome" type="text" value= <?php echo $prospect->nome ?> placeholder="Digite seu nome" autofocus class="form-control" required/>
                    <label for="cpf">CPF:</label>
                    <input name="cpf" id="cpf" type="text" value= <?php echo $prospect->cpf ?> placeholder="Digite seu CPF" autofocus class="form-control" required/>
                    <label for="email">E-mail:</label>
                    <input name="email" id="email" type="text" value= <?php echo $prospect->email ?> placeholder="Digite seu e-mail" autofocus class="form-control" required/>
                    <label for="telefone">Telefone:</label>
                    <input name="telefone" id="telefone" type="text" value= <?php echo $prospect->telefone ?> placeholder="Digite seu telefone" autofocus class="form-control" required/>
                    <label for="whatsapp">Whatsapp:</label>
                    <input name="whatsapp" id="whatsapp" type="text" value= <?php echo $prospect->whatsapp ?> placeholder="Digite seu telefone Whatsapp" autofocus class="form-control" required/>
                    <label for="facebook">Facebook:</label>
                    <input name="facebook" id="facebook" type="text" value= <?php echo $prospect->facebook ?> placeholder="Digite seu usuário do Facebook" autofocus class="form-control" required/>
                    <label for="rua">Rua:</label>
                    <input name="rua" id="rua" type="text" value= <?php echo $prospect->rua ?> placeholder="Digite seu endereço" autofocus class="form-control" required/>
                    <label for="numero">Número:</label>
                    <input name="numero" id="numero" type="text" value= <?php echo $prospect->numero ?> autofocus class="form-control" required/>
                    <label for="bairro">Bairro:</label>
                    <input name="bairro" id="bairro" type="text" value= <?php echo $prospect->bairro ?> autofocus class="form-control" required/>
                    <label for="cidade">Cidade:</label>
                    <input name="cidade" id="cidade" type="text" value= <?php echo $prospect->cidade ?> autofocus class="form-control" required/>
                    <label for="estado">Estado:</label>
                    <input name="estado" id="estado" type="text" value= <?php echo $prospect->estado ?> autofocus class="form-control" required/>
                    <label for="cep">CEP:</label>
                    <input name="cep" id="cep" type="text" value= <?php echo $prospect->cep ?> autofocus class="form-control" required/>
                </div>
                <?php
                    
                ?>
                <button type="submit" class="btn btn-success">Alterar</button>
                <a href="v_listar_prospect.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </body>
</html>
<?php
    }else{
        $_SESSION['erroLogin'] = "Por favor, faça login com seu usuário e senha!";
        header("Location: ../index.php");
    }
?>