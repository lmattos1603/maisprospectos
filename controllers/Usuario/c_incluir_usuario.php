<?php
    session_start();
    $separador = DIRECTORY_SEPARATOR;
    $root = $_SERVER['DOCUMENT_ROOT'].$separador;

    require_once($root.'maisprospectos/controllers/Usuario/usuarioController.php');
    use controllers\ControllerUsuario;
    
    if(isset($_POST['nome']) && isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['email']) && isset($_POST['celular'])){
        $nome = $_POST['nome'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        
        try{
            $ctrlUsuario = new ControllerUsuario();
            $usuario = $ctrlUsuario->salvarUsuario($nome, $login, $senha, $email, $celular);

            $_SESSION['cadastroOk'] = "Usuário cadastrado com sucesso!";
            header("Location: ../../index.php");
        }catch(\Exception $e){
            $_SESSION['erroCadastro'] = "Não foi possível cadastrar novo Usuário, usuário já existente!";
            header("Location: ../../views/Usuarios/v_incluir_usuario.php");
        }

    }else{
        $_SESSION['erroCadastro'] = "Não foi possível cadastrar novo Usuário!";
        header("Location: ../../views/Usuarios/v_incluir_usuario.php");
    }
?>