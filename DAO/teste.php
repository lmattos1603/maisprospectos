<?php
require_once('DAOUsuario.php');
use DAO\DAOUsuario;
$daoUsuario = new DAOUsuario();
try{
    $daoUsuario->incluirUsuario("Lucas", "lmattos", "123", "lmattos@mail.com", "123456", TRUE);
}catch(\Exception $e){
    die($e->getMessage());
}

require_once('DAOProspect.php');
use DAO\DAOProspect;
$daoProspect = new DAOProspect();
try{
    $daoProspect->deletarProspect("4", TRUE);
}catch(\Exception $e){
    die($e->getMessage());
}
?>