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
            $sql = $conexaoDB->prepare("select login, nome, email, celular from usuario 
                                        where
                                        login = ?
                                        and
                                        senha = ?");// proteje contra sql inject.
            $sql->bind_param("ss", $login, $senha);
            $sql->execute();// executa o banco.

            $resultado = $sql->get_result(); // recebe o resultado do banco de dados.

            if($resultado->num_rows === 0){ // se o resultado for igual a 0 os atributos serão null.
                $this->login = null;
                $this->nome = null;
                $this->email = null;
                $this->celular = null;
                $this->logado = FALSE;
            }else{
                while($linha = $resultado->fatch_assoc()){ // senão as variáveis receberão um array com as informações.
                    $this->login = $linha['login'];
                    $this->nome = $linha['nome'];
                    $this->email = $linha['email'];
                    $this->celular = $linha['celular'];
                    $this->logado = TRUE; 
                }
            }
            $sql->close(); // fecha o sql.
            $conexaoDB->close(); // fecha a conexão.
            return $this->logado; // retorna se está logado ou não.
        }

        public function incluirUsuario($nome, $email, $login, $senha){
            $conexaoDB = $this->conectarBanco();

            $sqlInsert = $conexaoDB->prepare("insert into usuario
                                            (nome, email, login, senha)
                                            values
                                            (?, ?, ?, ?)");
            $sqlInsert->bind_param("ssss", $nome, $email, $login, $senha);

            $sqlInsert->execute();
            
            return TRUE;
        }

        private function conectarBanco(){
            $conn = new \mysqli('localhost', 'root', '', 'prospects');
            return $conn;
        }
    }
?>