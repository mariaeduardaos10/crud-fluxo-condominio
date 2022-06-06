<?php

class UnidadeDAO {

    public function create(Unidade $unidade)
    {
        try {
            $sql = "INSERT INTO unidade (                   
                  numero,bloco,andar)
                  VALUES (
                  :numero,:bloco,:andar)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":numero", $unidade->getNumero());
            $p_sql->bindValue(":bloco", $unidade->getBloco());
            $p_sql->bindValue(":andar", $unidade->getAndar());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir unidade <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM unidade order by numero asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaUnidades($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    private function listaUnidades($row) {
        $unidade = new Unidade();
        $unidade->setId($row['id']);
        $unidade->setNumero($row['numero']);
        $unidade->setBloco($row['bloco']);
        $unidade->setAndar($row['andar']);

        return $unidade;
    }

    public function delete(Unidade $unidade) {
        try {
            $sql = "DELETE FROM unidade WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $unidade->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir unidade<br> $e <br>";
        }

    }

    public function update(Unidade $unidade) {
        try {
            $sql = "UPDATE unidade set
                
                  numero=:numero,
                  bloco=:bloco,
                  andar=:andar
                                                                       
                  WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":numero", $unidade->getNumero());
            $p_sql->bindValue(":bloco", $unidade->getBloco());
            $p_sql->bindValue(":andar", $unidade->getAndar());
            $p_sql->bindValue(":id", $unidade->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }
}