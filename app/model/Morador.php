<?php

class Morador{
    
    private $id;
    private $nome;
    private $sobrenome;
    private $idade;
    private $sexo;
    private $idapartamento;
    private $telefone;
    private $descapartamento;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * @param mixed $sobrenome
     */
    public function setSobrenome($sobrenome): void
    {
        $this->sobrenome = $sobrenome;
    }

    /**
     * @return mixed
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * @param mixed $idade
     */
    public function setIdade($idade): void
    {
        $this->idade = $idade;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo): void
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getIdapartamento()
    {
        return $this->idapartamento;
    }

    /**
     * @param mixed $idapartamento
     */
    public function setIdapartamento($idapartamento): void
    {
        $this->idapartamento = $idapartamento;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone): void
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getDescapartamento()
    {
        return $this->descapartamento;
    }

    /**
     * @param mixed $descapartamento
     */
    public function setDescapartamento($descapartamento): void
    {
        $this->descapartamento = $descapartamento;
    }

}

