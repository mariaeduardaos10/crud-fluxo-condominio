<?php
/*
    Criação da classe Morador com o CRUD
*/
class MoradorDAO{

    public function create(Morador $morador) {
        try {
            $sql = "INSERT INTO morador (                   
                  nome,sobrenome,idade,sexo,idapartamento,telefone)
                  VALUES (
                  :nome,:sobrenome,:idade,:sexo,:idapartamento,:telefone)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $morador->getNome());
            $p_sql->bindValue(":sobrenome", $morador->getSobrenome());
            $p_sql->bindValue(":idade", $morador->getIdade());
            $p_sql->bindValue(":sexo", $morador->getSexo());
            $p_sql->bindValue(":idapartamento", $morador->getIdapartamento());
            $p_sql->bindValue(":telefone", $morador->gettelefone());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir morador <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM morador order by nome asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaMoradores($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    public function update(Morador $morador) {
        try {
            $sql = "UPDATE morador set
                
                  nome=:nome,
                  sobrenome=:sobrenome,
                  idade=:idade,
                  sexo=:sexo,
                  idapartamento=:idapartamento,
                  telefone=:telefone
                                                                       
                  WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $morador->getNome());
            $p_sql->bindValue(":sobrenome", $morador->getSobrenome());
            $p_sql->bindValue(":idade", $morador->getIdade());
            $p_sql->bindValue(":sexo", $morador->getSexo());
            $p_sql->bindValue(":id", $morador->getId());
            $p_sql->bindValue(":idapartamento", $morador->getIdapartamento());
            $p_sql->bindValue(":telefone", $morador->getTelefone());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete(Morador $morador) {
        try {
            $sql = "DELETE FROM morador WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $morador->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir morador<br> $e <br>";
        }
    }

    private function listaMoradores($row) {
        $morador = new Morador();
        $unidade = new Unidade();
        $morador->setId($row['id']);
        $morador->setNome($row['nome']);
        $morador->setSobrenome($row['sobrenome']);
        $morador->setIdade($row['idade']);
        $morador->setSexo($row['sexo']);
        $morador->setIdapartamento($row['idapartamento']);
        $morador->setTelefone($row['telefone']);

        return $morador;
    }

}


?>
