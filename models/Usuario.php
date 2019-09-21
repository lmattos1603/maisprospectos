<?php
    namespace models;

    class Usuario{
        public $nome;
        public $login;
        public $email;
        public $celular;
        public $logado;

        public function logar($login, $senha){
            $conexaoDB = $this->conectarBanco();
            $sql = $conexaoDB->prepare("select login, nome, email, celular from usuario
                                        where
                                        login = ?
                                        and
                                        senha = ?");
            $sql->bind_param("ss", $login, $senha);
            $sql->execute();

            $resultado = $sql->get_result();
            if($resultado->num_rows() === 0){
                $this->login = null;
                $this->nome = null;
                $this->email = null;
                $this->celular = null;
                $this->logado = FALSE;
            }else{
                while($linha = $resultado->fatch_assoc()){
                    $this->login = $linha['login'];
                    $this->nome = $linha['nome'];
                    $this->email = $linha['email'];
                    $this->celular = $linha['celular'];
                    $this->logado = FALSE; 
                }
            }
            $sql->close();
        }
        private function conectarBanco(){
            $conn = new \mysqli('localhost', 'root', 'prospects');
            return $conn;
        }
    }
?>