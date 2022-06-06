<?php
include_once "../conexao/Conexao.php";
include_once "../model/Unidade.php";
include_once "../dao/UnidadeDAO.php";

//instancia as classes
$unidade = new Unidade();
$unidadedao = new UnidadeDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])) {

    $unidade->setNumero($d['numero']);
    $unidade->setBloco($d['bloco']);
    $unidade->setAndar($d['andar']);

    $unidadedao->create($unidade);


    header("Location: ../../unidade.php");
}
// se a requisição for editar
else if(isset($_POST['editar'])) {
    $unidade->setNumero($d['numero']);
    $unidade->setBloco($d['bloco']);
    $unidade->setAndar($d['andar']);

    $unidadedao->update($unidade);

    header("Location: ../../unidade.php");
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $unidade->setId($_GET['del']);

    $unidadedao->delete($unidade);

    header("Location: ../../unidade.php");
}else{
    header("Location: ../../unidade.php");
}

if(isset($_POST['voltar'])){
    header("Location: ../../");
}