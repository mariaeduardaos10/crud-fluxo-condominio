<?php

class Unidade {

    private $id;
    private $numero;
    private $bloco;
    private $andar;

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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getBloco()
    {
        return $this->bloco;
    }

    /**
     * @param mixed $bloco
     */
    public function setBloco($bloco): void
    {
        $this->bloco = $bloco;
    }

    /**
     * @return mixed
     */
    public function getAndar()
    {
        return $this->andar;
    }

    /**
     * @param mixed $andar
     */
    public function setAndar($andar): void
    {
        $this->andar = $andar;
    }


}