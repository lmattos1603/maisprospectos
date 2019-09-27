<?php
namespace models;

class Prospect{
        public $id;
        public $nome;
        public $cpf;
        public $email;
        public $telefone;
        public $whatsapp;
        public $rua;
        public $numero;
        public $bairro;
        public $cidade;
        public $estado;
        public $cep;
        public $encontrado;

        public function inserirProspect($nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $bairro, $cidade, $estado, $cep){
            $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.

            $sqlInsert = $conexaoDB->prepare("insert into prospect  
                                            (nome, cpf, email, telefone, whatsapp, rua, numero, bairro, cidade, estado, cep)
                                            values
                                            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");  // recebe os dados sem abrir brecha para SQLInjection.
            $sqlInsert->bind_param("sssssssssss", $nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $bairro, $cidade, $estado, $cep);

            $sqlInsert->execute();  // executa o sqlInsert.
            if(!$sqlInsert->error){  // verifica se dá algum erro no sqlInsert.
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function editarProspect($nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $bairro, $cidade, $estado, $cep, $id){
            $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.

            $sqlUpdate = $conexaoDB->prepare("update prospect set 
                                            nome = ?, cpf = ?, email = ?, telefone = ?, whatsapp = ?, rua = ?,
                                            numero = ?, bairro = ?, cidade = ?, estado = ?, cep = ?
                                            where
                                            id = ?");  // recebe os dados sem abrir brecha para SQLInjection.
            $sqlUpdate->bind_param("sssssssssssi", $nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $bairro, $cidade, $estado, $cep, $id);

            $sqlUpdate->execute();  // executa o sqlUpdate.
            if(!$sqlUpdate->error){  // verifica se dá algum erro no sqlInsert.
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function buscarProspect($cpf){
            $conexaoDB = $this->conectarBanco();// cpnecta com o banco.
            $sql = $conexaoDB->prepare("select cpf from prospect 
                                        where
                                        cpf = ?");// proteje contra sql injection.
            $sql->bind_param("s", $cpf);
            $sql->execute();// executa o banco.
            
            $resultado = $sql->get_result(); // recebe o resultado do banco de dados.

            if($resultado->num_rows === 0){ // se o resultado for igual a 0 os atributos serão null.
                $this->nome = NULL;
                $this->cpf = NULL;
                $this->email = NULL;
                $this->telefone = NULL;
                $this->whatsapp = NULL;
                $this->rua = NULL;
                $this->numero = NULL;
                $this->bairro = NULL;
                $this->cidade = NULL;
                $this->estado = NULL;
                $this->cep = NULL;
                $this->encontrado = FALSE;
            }else{
                while($linha = $resultado->fetch_assoc()){ // senão as variáveis receberão um array com as informações.
                    $this->nome = $linha['nome'];
                    $this->cpf = $linha['cpf'];
                    $this->email = $linha['email'];
                    $this->telefone = $linha['telefone'];
                    $this->whatsapp = $linha['whatsapp'];
                    $this->rua = $linha['rua'];
                    $this->numero = $linha['numero'];
                    $this->bairro = $linha['bairro'];
                    $this->cidade = $linha['cidade'];
                    $this->estado = $linha['estado'];
                    $this->cep = $linha['cep'];
                    $this->encontrado = TRUE; 
                }
            }
            $sql->close(); // fecha o sql.
            $conexaoDB->close(); // fecha a conexão.
            return $this->encontrado; // retorna se está logado ou não.
        }

        public function deletarProspect($cpf){
            $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.

            $sqlSelect = $conexaoDB->prepare("select cpf from prospect
                                            where 
                                            cpf = ?");  // recebe os dados sem abrir brecha para SQLInjection.
            $sqlSelect->bind_param("s", $cpf);

            $sqlSelect->execute();  // executa o sqlUpdate.

            $resultado = $sql->get_result(); // recebe o resultado do banco de dados.

            if($resultado->num_rows === 0){ // se o resultado for igual a 0 os atributos serão null.
                $this->encontrado = FALSE;
            }else{
                $this->encontrado = TRUE;
                $sqlDelete = $conexaoDB->prepare("delete from prospect
                                            where 
                                            cpf = ?");  // recebe os dados sem abrir brecha para SQLInjection.
                $sqlDelete->bind_param("s", $cpf);

                $sqlDelete->execute();
            }

            if(!$sqlDelete->error){  // verifica se dá algum erro no sqlDelete.
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