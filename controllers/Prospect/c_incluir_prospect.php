<?php
    session_start();
    $separador = DIRECTORY_SEPARATOR;
    $root = $_SERVER['DOCUMENT_ROOT'].$separador;

    require_once($root.'maisprospectos/controllers/Prospect/prospectController.php');
    require_once($root.'maisprospectos/models/Prospect.php');
    use controllers\ControllerProspect;
    use models\Prospect;

    if(isset($_POST['email'])){
        
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $whatsapp = $_POST['whatsapp'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $facebook = $_POST['facebook'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];
        
        try{
            $prospecto = new Prospect();
            $ctrlProspect = new ControllerProspect();
            $prospecto->addProspecto(null, $nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep);
            $prospect = $ctrlProspect->salvarProspect($prospecto);
            
            $_SESSION['cadastroP'] = "Prospecto cadastrado com sucesso!";
            header("Location: ../../views/Prospect/v_listar_prospect.php");
        }catch(\Exception $e){
            $_SESSION['erroCadastroP'] = "Não foi possível cadastrar novo Prospecto, já existe!";
            header("Location: ../../views/Prospect/v_listar_prospect.php");
        }

    }else{
        $_SESSION['erroCadastro'] = "Não foi possível cadastrar novo Prospecto!";
        header("Location: ../../views/Usuarios/v_listar_prospect.php");
    }
?>