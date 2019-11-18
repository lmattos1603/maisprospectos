<?php
    session_start();
    $separador = DIRECTORY_SEPARATOR;
    $root = $_SERVER['DOCUMENT_ROOT'].$separador;

    require_once($root.'maisprospectos/controllers/Prospect/prospectController.php');
    require_once($root.'maisprospectos/models/Prospect.php');
    use controllers\ControllerProspect;
    use models\Prospect;

    if(isset($_POST['email'])){
        
        $id = $_POST['id'];
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
            $prospecto->addProspecto($id, $nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep);
            $prospect = $ctrlProspect->salvarProspect($prospecto);
            
            $_SESSION['alterado'] = "Prospecto alterado com sucesso!";
            header("Location: ../../views/Prospect/v_listar_prospect.php");
        }catch(\Exception $e){
            $_SESSION['erroAlteracao'] = "Não foi possível alterar o Prospecto!";
            header("Location: ../../views/Prospect/v_listar_prospect.php");
        }

    }else{
        $_SESSION['erroCadastro'] = "Não foi possível cadastrar novo Prospecto!";
        header("Location: ../../views/Usuarios/v_listar_prospect.php");
    }
?>