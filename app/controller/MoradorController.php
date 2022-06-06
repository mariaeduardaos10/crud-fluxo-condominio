<?php
include_once "../conexao/Conexao.php";
include_once "../model/Morador.php";
include_once "../dao/MoradorDAO.php";

//instancia as classes
$morador = new Morador();
$moradordao = new MoradorDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $morador->setNome($d['nome']);
    $morador->setSobrenome($d['sobrenome']);
    $morador->setIdade($d['idade']);
    $morador->setSexo($d['sexo']);
    $morador->setIdapartamento($d['idapartamento']);
    $morador->setTelefone($d['telefone']);

    $moradordao->create($morador);

    header("Location: ../../");
} 
// se a requisição for editar
else if(isset($_POST['editar'])){

    $morador->setNome($d['nome']);
    $morador->setSobrenome($d['sobrenome']);
    $morador->setIdade($d['idade']);
    $morador->setSexo($d['sexo']);
    $morador->setId($d['id']);
    $morador->setIdapartamento($d['idapartamento']);
    $morador->setTelefone($d['telefone']);

    $moradordao->update($morador);

    header("Location: ../../");
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $morador->setId($_GET['del']);

    $moradordao->delete($morador);

    header("Location: ../../");
}else{
    header("Location: ../../");
}

if(isset($_POST['cadastrarUnidade'])){
    header("Location: ../../unidade.php");
}