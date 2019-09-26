<?php
    namespace models;

    class Usuario{
        public $nome;
        public $login;
        public $email;
        public $celular;
        public $logado;

        public function logar($login, $senha){
            $conexaoDB = $this->conectarBanco();// cpnecta com o banco.
            $sql = $conexaoDB->prepare("select nome, login, email, celular from usuario 
                                        where
                                        login = ?
                                        and
                                        senha = ?");// proteje contra sql injection.
            $sql->bind_param("ss", $login, $senha);
            $sql->execute();// executa o banco.
            
            $resultado = $sql->get_result(); // recebe o resultado do banco de dados.

            if($resultado->num_rows === 0){ // se o resultado for igual a 0 os atributos serão null.
                $this->nome = null;
                $this->login = null;
                $this->email = null;
                $this->celular = null;
                $this->logado = FALSE;
            }else{
                while($linha = $resultado->fetch_assoc()){ // senão as variáveis receberão um array com as informações.
                    $this->nome = $linha['nome'];
                    $this->login = $linha['login'];
                    $this->email = $linha['email'];
                    $this->celular = $linha['celular'];
                    $this->logado = TRUE; 
                }
            }
            $sql->close(); // fecha o sql.
            $conexaoDB->close(); // fecha a conexão.
            return $this->logado; // retorna se está logado ou não.
        }

        public function incluirUsuario($nome, $login, $senha, $email, $celular){
            $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.

            $sqlInsert = $conexaoDB->prepare("insert into usuario  
                                            (nome, login, senha, email, celular)
                                            values
                                            (?, ?, ?, ?, ?)");  // recebe os dados sem abrir brecha para SQLInjection.
            $sqlInsert->bind_param("sssss", $nome, $login, $senha, $email, $celular);

            $sqlInsert->execute();  // executa o sqlInsert.
            if(!$sqlInsert->error){  // verifica se dá algum erro no sqlInsert.
                return TRUE;
            }else{
                return FALSE;
            }
        }

        private function conectarBanco(){ // cria um objeto (que é uma conexão com o Banco).
            $conn = new \mysqli('localhost', 'root', '', 'prospects');
            return $conn;
        }
    }
?>