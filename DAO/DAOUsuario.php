<?php
    namespace DAO;
    mysqli_report(MYSQLI_REPORT_STRICT);

    require_once('../models/Usuario.php');
    use MODELS\Usuario;
    
    /**
     * Esta classe é responsável por fazer a comunicação com o banco de dados,
     * provenso as funções de logar e incluir um novo usuário
     * @author Lucas de Mattos
     * @package DAO
     */
    class DAOUsuario{
        public $retorno;
        /**
         * Faz o login do usuário no sistema e retorna um objeto usuario
         * @param string $login Login do usuário
         * @param string $senha Senha do usuário
         * @return Usuario retorna um objeto com os dados
         */
        public function logar($login, $senha){
            try{
                $conexaoDB = $this->conectarBanco();// conecta com o banco.
            }catch(\Exception $e){
                die($e->getMessage());
            }

            $usuario = new Usuario();
            $sql = $conexaoDB->prepare("select nome, login, email, celular from usuario 
                                        where
                                        login = ?
                                        and
                                        senha = ?");// proteje contra sql injection.
            $sql->bind_param("ss", $login, $senha);
            $sql->execute();// executa o banco.
            
            $resultado = $sql->get_result(); // recebe o resultado do banco de dados.

            if($resultado->num_rows === 0){ // se o resultado for igual a 0 os atributos serão null.
                $usuario->addUsuario(null, null, null, null, FALSE);
            }else{
                while($linha = $resultado->fetch_assoc()){ // senão as variáveis receberão um array com as informações.
                    $usuario->addUsuario($linha['nome'],$linha['login'],$linha['email'],$linha['celular'],TRUE);
                }
            }
            $sql->close(); // fecha o sql.
            $conexaoDB->close(); // fecha a conexão.
            return $usuario; // retorna se está logado ou não.
        }
        /**
         * Inclui um usuário novo no sistema
         * @param string $nome Nome do usuário
         * @param string $login Login do usuário
         * @param string $senha Senha do usuário
         * @param string $email Email do usuário
         * @param string $celular Celular do usuário
         * @return TRUE|Exception TRUE inclusao bem sucedida ou Exception se não for bem sucedida
         */
        public function incluirUsuario($nome, $login, $senha, $email, $celular){
            try{
                $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.
            }catch(\Exception $e){
                die($e->getMessage());
            }
            $sqlInsert = $conexaoDB->prepare("insert into usuario  
                                            (nome, login, senha, email, celular)
                                            values
                                            (?, ?, ?, ?, ?)");  // recebe os dados sem abrir brecha para SQLInjection.
            $sqlInsert->bind_param("sssss", $nome, $login, $senha, $email, $celular);

            $sqlInsert->execute();  // executa o sqlInsert.
            if(!$sqlInsert->error){  // verifica se dá algum erro no sqlInsert.
                $retorno = TRUE;
            }else{
                throw new \Exception("Não foi possível incluir novo usuário");
                die;
            }

            $conexaoDB->close();
            $sqlInsert->close();
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