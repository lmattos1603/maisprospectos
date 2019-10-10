<?php
/*require_once('DAOUsuario.php');
use DAO\DAOUsuario;
$daoUsuario = new DAOUsuario();
try{
    $daoUsuario->incluirUsuario("Lucas", "lmattos", "123", "lmattos@mail.com", "123456", TRUE);
}catch(\Exception $e){
    die($e->getMessage());
}*/

/*require_once('DAOProspect.php');
use DAO\DAOProspect;
$daoProspect = new DAOProspect();
try{
    $daoProspect->inserirProspect("nome", "cpf", "email", "telefone", "whatsapp", "rua", "numero", 
                                "facebook", "bairro", "cidade", "estado", "cep", TRUE);
}catch(\Exception $e){
    die($e->getMessage());
}*/

require_once('DAOProspect.php');
use DAO\DAOProspect;
$daoProspect = new DAOProspect();
try{
    $daoProspect->buscarProspect("email");
}catch(\Exception $e){
    die($e->getMessage());
}
?>