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
        <style type="text/css">
            .table-overflow {
                max-height:600px;
                overflow-y:auto;
            }
        </style>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="collapse navbar-collapse" id="textoNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link " href="../../views/main.php">Home <span class="sr-only">(Página atual)</span></a>
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
                    <a class="nav-link" href="../../controllers/controller_logout.php">Sair</a>
                </div>
            </nav>
        </header><br>
        <div class="container">
            <div class="table-overflow" style= "height: 750; overflow: auto;">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">WhatsApp</th>
                            <th scope="col">Rua</th>
                            <th scope="col">Número</th>
                            <th scope="col">Facebook</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Estado</th>
                            <th scope="col">CEP</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $ctrlProspect = new ControllerProspect();
                            $listaProspects = $ctrlProspect->buscarProspects();
                            foreach($listaProspects as $prospect){
                                echo '<tr>';
                                    echo '<td>' .$prospect->nome.'</td>';
                                    echo '<td>' .$prospect->cpf.'</td>';
                                    echo '<td>' .$prospect->email.'</td>';
                                    echo '<td>' .$prospect->telefone.'</td>';
                                    echo '<td>' .$prospect->whatsapp.'</td>';
                                    echo '<td>' .$prospect->rua.'</td>';
                                    echo '<td>' .$prospect->numero.'</td>';
                                    echo '<td>' .$prospect->facebook.'</td>';
                                    echo '<td>' .$prospect->bairro.'</td>';
                                    echo '<td>' .$prospect->cidade.'</td>';
                                    echo '<td>' .$prospect->estado.'</td>';
                                    echo '<td>' .$prospect->cep.'</td>';
                                    echo '<td width="150"><a href="v_alterar_prospect.php?email='.$prospect->email.'">alterar</a> |
                                          <a href="../../controllers/Prospect/c_excluir_prospect.php?id='.$prospect->id.'">excluir</a></td>';
                                echo '</tr>';
                            }
                            if(isset($_SESSION['excluido'])){
                                echo $_SESSION['excluido'];
                                unset($_SESSION['excluido']);
                            }elseif(isset($_SESSION['erroExclusao'])){
                                echo $_SESSION['erroExclusao'];
                                unset($_SESSION['erroExclusao']);
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div>
                <a class="btn btn-primary" href="v_incluir_prospect.php">Novo</a>
            </div>
            <?php
            if(isset($_SESSION['cadastroP'])){
                echo $_SESSION['cadastroP'];
                unset($_SESSION['cadastroP']);
            }elseif(isset($_SESSION['erroCadastroP'])){
                echo $_SESSION['erroCadastroP'];
                unset($_SESSION['erroCadastroP']);
            }elseif(isset($_SESSION['alterado'])){
                echo $_SESSION['alterado'];
                unset($_SESSION['alterado']);
            }elseif(isset($_SESSION['erroAlteracao'])){
                echo $_SESSION['erroAlteracao'];
                unset($_SESSION['erroAlteracao']);
            }
        ?>
        </div>
    </body>
</html>
<?php
    }else{
        $_SESSION['erroLogin'] = "Por favor, faça login com seu usuário e senha!";
        header("Location: ../index.php");
    }
?>