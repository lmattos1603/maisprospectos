<?php
namespace DAO;
mysqli_report(MYSQLI_REPORT_STRICT);

require_once('../models/Prospect.php');
use MODELS\Prospect;

/**
 * Esta classe é responsável por fazer a comunicação com o banco de dados,
 * provendo as funções de incluir, editar, buscar e excluir prospectos
 * @author Lucas de Mattos
 * @package DAO
 */
class DAOProspect{
    public $retorno;
    /**
     * Faz a inclusão de um prospecto no sistema
     * @param string $nome Nome do Prospecto
     * @param string $cpf CPF do Prospecto
     * @param string $email E-mail do Prospecto
     * @param string $telefone Telefone do Prospecto
     * @param string $whatsapp WhatsApp do Prospecto
     * @param string $rua Endereço do Prospecto
     * @param string $numero Número da casa ou apartamento
     * @param string $facebook Facebook do Prospecto
     * @param string $bairro Bairro que o Prospecto mora
     * @param string $cidade Cidade que o Prospecto mora
     * @param string $estado Estado que o Prospecto mora
     * @param string $cep CEP da cidade ou endereço do Prospecto
     * @return TRUE|Exception TRUE inclusao bem sucedida ou Exception se não for bem sucedida
     */
    public function inserirProspect($nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep){
        try{
            $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.
        }catch(\Exception $e){
            die($e->getMessage());
        }
        $sqlInsert = $conexaoDB->prepare("insert into prospect  
                                        (nome, cpf, email, telefone, whatsapp, rua, numero, facebook, bairro, cidade, estado, cep)
                                        values
                                        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");  // recebe os dados sem abrir brecha para SQLInjection.
        $sqlInsert->bind_param("ssssssssssss", $nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep);

        $sqlInsert->execute();  // executa o sqlInsert.
        if(!$sqlInsert->error){  // verifica se dá algum erro no sqlInsert.
            $retorno = TRUE;
        }else{
            throw new \Exception("Não foi possível incluir novo Prospecto!!");
            die;
        }
        $sqlInsert->close(); // fecha o sql.
        $conexaoDB->close(); // fecha a conexão.
        return $retorno;
    }
    /**
     * Faz a edição dos dados de um prospecto no sistema
     * @param string $nome Nome do Prospecto
     * @param string $cpf CPF do Prospecto
     * @param string $email E-mail do Prospecto
     * @param string $telefone Telefone do Prospecto
     * @param string $whatsapp WhatsApp do Prospecto
     * @param string $rua Endereço do Prospecto
     * @param string $numero Número da casa ou apartamento
     * @param string $facebook Facebook do Prospecto
     * @param string $bairro Bairro que o Prospecto mora
     * @param string $cidade Cidade que o Prospecto mora
     * @param string $estado Estado que o Prospecto mora
     * @param string $cep CEP da cidade ou endereço do Prospecto
     * @param int $id Id do Prospecto a ser editado
     * @return TRUE|Exception TRUE inclusao bem sucedida ou Exception se não for bem sucedida
     */
    public function editarProspect($nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep, $id){
        try{
            $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.
        }catch(\Exception $e){
            die($e->getMessage());
        }

        $sqlUpdate = $conexaoDB->prepare("update prospect set 
                                        nome = ?, cpf = ?, email = ?, telefone = ?, whatsapp = ?, rua = ?,
                                        numero = ?, facebook = ?, bairro = ?, cidade = ?, estado = ?, cep = ?
                                        where
                                        id = ?");  // recebe os dados sem abrir brecha para SQLInjection.
        $sqlUpdate->bind_param("ssssssssssssi", $nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep, $id);

        $sqlUpdate->execute();  // executa o sqlUpdate.
        if(!$sqlUpdate->error){  // verifica se dá algum erro no sqlInsert.
            $retorno = TRUE;
        }else{
            throw new \Exception("Não foi possível alterar os dados do Prospecto!!");
            die;
        }
        $sqlUpdate->close(); // fecha o sql.
        $conexaoDB->close(); // fecha a conexão.
        return $retorno;
    }
    /**
     * Faz a busca de um Prospecto pelo seu email cadastrado no sistema
     * @param string $email E-mail do Prospecto
     * @return Prospect retorna um array de objetos com os dados do Prospecto
     */
    public function buscarProspect($email=null){
        try{
            $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.
        }catch(\Exception $e){
            die($e->getMessage());
        }
        $prospects = array();

        if($email === null){
            $sqlBusca = $conexaoDB->prepare("select id, nome, cpf, email, telefone, whatsapp, rua, numero, facebook, bairro, cidade, estado, cep 
                                        from prospect");// proteje contra sql injection.
            $sqlBusca->execute();// executa o banco.
        }else{
            $sqlBusca = $conexaoDB->prepare("select id, nome, cpf, email, telefone, whatsapp, rua, numero, facebook, bairro, cidade, estado, cep 
                                    from prospect 
                                    where
                                    email = ?");// proteje contra sql injection.
            $sqlBusca->bind_param("s", $email);
            $sqlBusca->execute();// executa o banco.
        }
        
        $resultado = $sqlBusca->get_result(); // recebe o resultado do banco de dados.

        if($resultado->num_rows !== 0){ // se o resultado for diferente de 0 os atributos não serão null.
            while($linha = $resultado->fetch_assoc()){ // as variáveis receberão um array com as informações.
                $prospect = new Prospect();
                $prospect->addProspecto($linha['id'], $linha['nome'], $linha['cpf'], $linha['email'],
                                   $linha['telefone'], $linha['whatsapp'], $linha['rua'], $linha['numero'], 
                                   $linha['facebook'],$linha['bairro'], $linha['cidade'], $linha['estado'],$linha['cep']);
                $prospects[] = $prospect;
            }
        }
        
        $sqlBusca->close(); // fecha o sql.
        $conexaoDB->close(); // fecha a conexão.
        return $prospects; 
    }

    public function deletarProspect($id){
        try{
            $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.
        }catch(\Exception $e){
            die($e->getMessage());
        }

        $sqlDelete = $conexaoDB->prepare("delete from prospect
                                        where 
                                        id = ?");  // recebe os dados sem abrir brecha para SQLInjection.
        $sqlDelete->bind_param("i", $id);
        $sqlDelete->execute();  // executa o sqlUpdate.

        if(!$sqlDelete->error){  // verifica se dá algum erro no sqlDelete.
            $retorno = TRUE;
        }else{
            throw new \Exception("Não foi possível excluir o Prospecto!!");
            die;
        }
        $sqlDelete->close(); // fecha o sql.
        $conexaoDB->close(); // fecha a conexão.
        return $retorno;
    }
    /**
     * Cria uma conexão no banco de dados
     * @return \mysqli Retorna um objeto do MySQLi
     */
    private function conectarBanco(){ // cria um objeto (que é uma conexão com o Banco).
        define('DS', DIRECTORY_SEPARATOR);
        define('BASE_DIR', dirname(__FILE__).DS);
        require_once(BASE_DIR.'config.php');

        try{
            $conn = new \mysqli($dbhost, $user, $senha, $banco);
            return $conn;
        }catch(mysqli_sql_exception $e){
            throw new \Exception($e);
            die;
        }
    }
}
?>