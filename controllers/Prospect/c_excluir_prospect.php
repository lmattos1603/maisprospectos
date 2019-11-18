<?php
session_start();
require_once("../../models/Prospect.php");
require_once("../../controllers/Prospect/prospectController.php");
use controllers\ControllerProspect;
use models\Prospect;
    
if(isset($_SESSION['usuario'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $nome = $_GET['nome'];
        $cpf = $_GET['cpf'];
        $email = $_GET['email'];
        $telefone = $_GET['telefone'];
        $whatsapp = $_GET['whatsapp'];
        $rua = $_GET['rua'];
        $numero = $_GET['numero'];
        $facebook = $_GET['facebook'];
        $bairro = $_GET['bairro'];
        $cidade = $_GET['cidade'];
        $estado = $_GET['estado'];
        $cep = $_GET['cep'];
        
    try{
        $prospecto = new Prospect();
        $ctrlProspect = new ControllerProspect();
        $prospecto->addProspecto($id, $nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep);
        $prospect = $ctrlProspect->excluirProspect($prospecto);
        
        $_SESSION['excluido'] = "Prospecto excluído com sucesso!";
        header("Location: ../../views/Prospect/v_listar_prospect.php");
    }catch(\Exception $e){
        $_SESSION['erroExclusao'] = "Não foi possível excluir o Prospecto!";
        header("Location: ../../views/Prospect/v_listar_prospect.php");
    }
}else{
    $_SESSION['erroExclusao'] = "Não foi possível excluir o Prospecto!";
    header("Location: ../../views/Prospect/v_listar_prospect.php");
}
}else{
    $_SESSION['erroLogin'] = "Por favor, faça login com seu usuário e senha!";
    header("Location: ../index.php");
}
?>