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
        public $facebook;
        public $bairro;
        public $cidade;
        public $estado;
        public $cep;

        public function inserirProspect($nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep){
            $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.

            $sqlInsert = $conexaoDB->prepare("insert into prospect  
                                            (nome, cpf, email, telefone, whatsapp, rua, numero, facebook, bairro, cidade, estado, cep)
                                            values
                                            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");  // recebe os dados sem abrir brecha para SQLInjection.
            $sqlInsert->bind_param("ssssssssssss", $nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep);

            $sqlInsert->execute();  // executa o sqlInsert.
            if(!$sqlInsert->error){  // verifica se dá algum erro no sqlInsert.
                $retorno = TRUE;
            }else{
                $retorno = FALSE;
            }
            $sqlInsert->close(); // fecha o sql.
            $conexaoDB->close(); // fecha a conexão.
            return $retorno;
        }

        public function editarProspect($nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep, $id){
            $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.

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
                $retorno = FALSE;
            }
            $sqlUpdate->close(); // fecha o sql.
            $conexaoDB->close(); // fecha a conexão.
            return $retorno;
        }

        public function buscarProspect($email=null){
            $conexaoDB = $this->conectarBanco();// conecta com o banco.
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
                    $prospect = array(
                        "id" => $linha['nome'],
                        "cpf" => $linha['cpf'],
                        "email" => $linha['email'],
                        "telefone" => $linha['telefone'],
                        "whatsapp" => $linha['whatsapp'],
                        "rua" => $linha['rua'],
                        "numero" => $linha['numero'],
                        "facebook" => $linha['facebook'],
                        "bairro" => $linha['bairro'],
                        "cidade" => $linha['cidade'],
                        "estado" => $linha['estado'],
                        "cep" => $linha['cep']
                    );
                    $prospects[] = $prospect; 
                }
            }

            $sqlBusca->close(); // fecha o sql.
            $conexaoDB->close(); // fecha a conexão.
            return $prospects; // retorna se está logado ou não.
        }

        public function deletarProspect($id){
            $conexaoDB = $this->conectarBanco(); // recebe um objeto de conexão.

            $sqlDelete = $conexaoDB->prepare("delete from prospect
                                            where 
                                            id = ?");  // recebe os dados sem abrir brecha para SQLInjection.
            $sqlDelete->bind_param("i", $id);
            $sqlDelete->execute();  // executa o sqlUpdate.

            if(!$sqlDelete->error){  // verifica se dá algum erro no sqlDelete.
                $retorno = TRUE;
            }else{
                $retorno = FALSE;
            }
            $sqlDelete->close(); // fecha o sql.
            $conexaoDB->close(); // fecha a conexão.
            return $retorno;
        }

        private function conectarBanco(){ // cria um objeto (que é uma conexão com o Banco).
            $conn = new \mysqli('localhost', 'root', '', 'prospects');
            return $conn;
        }
    }
?>