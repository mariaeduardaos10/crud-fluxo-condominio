<?php
include_once "./app/conexao/Conexao.php";
include_once "./app/dao/MoradorDAO.php";
include_once "./app/dao/UnidadeDAO.php";
include_once "./app/model/Morador.php";
include_once "./app/model/Unidade.php";

//instancia as classes
$morador = new Morador();
$unidade = new Unidade();
$moradordao = new MoradorDAO();
$unidadedao = new UnidadeDAO();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <title>Fluxo condomínio</title>
    <style>
        .menu,
        thead {
            background-color: #bbb !important;
        }

        .row {
            padding: 10px;
        }
    </style>
    <script type="text/javascript">
        $("#telefone").mask("(00) 0000-0000");
    </script>
</head>

<body>
<nav class="navbar navbar-light bg-light menu">
    <div class="container">
        <a class="navbar-brand" href="#">
            FLUXO CONDOMÍNIO
        </a>
    </div>
</nav>
<div class="container">
    <form action="app/controller/MoradorController.php" method="POST">
        <div class="row">
            <div class="col-md-3">
                <label>Nome</label>
                <input type="text" name="nome" value="" autofocus class="form-control" require />
            </div>
            <div class="col-md-5">
                <label>Sobrenome</label>
                <input type="text" name="sobrenome" value="" class="form-control" require />
            </div>
            <div class="col-md-2">
                <label>Idade</label>
                <input type="number" name="idade" value="" class="form-control" require />
            </div>
            <div class="col-md-2">
                <label>Sexo</label>
                <select name="sexo" class="form-control">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Telefone</label>
                <input type="text" name="telefone" id="telefone" value="" class="form-control" require />
            </div>
            <div class="col-md-2">
                <label>Apartamento</label>
                <select name="idapartamento" class="form-control">
                    <?php foreach ($unidadedao->read() as $unidade) : ?>
                    <option value="<?= $unidade->getId() ?>"><?= $unidade->getNumero() ?> - <?= $unidade->getBloco() ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <br>
                    <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>
                </div>
                <div class="col-md-4">
                    <br>
                    <button class="btn btn-primary" type="submit"  name="cadastrarUnidade">Cadastrar Apartamento</button>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <div class="table-responsive">
        <table class="table table-sm table-bordered table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>Sexo</th>
                <th>Apartamento</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($moradordao->read() as $morador) : ?>
                <tr>
                    <td><?= $morador->getId() ?></td>
                    <td><?= $morador->getNome() ?></td>
                    <td><?= $morador->getSobrenome() ?></td>
                    <td><?= $morador->getIdade() ?></td>
                    <td><?= $morador->getSexo() ?></td>
                    <td><?= $morador->getIdapartamento() ?></td>
                    <td><?= $morador->getTelefone()?></td>
                    <td class="text-center">
                        <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $morador->getId() ?>">
                            Editar
                        </button>
                        <a href="app/controller/MoradorController.php?del=<?= $morador->getId() ?>">
                            <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                        </a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="editar><?= $morador->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="app/controller/MoradorController.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Nome</label>
                                            <input type="text" name="nome" value="<?= $morador->getNome() ?>" class="form-control" require />
                                        </div>
                                        <div class="col-md-7">
                                            <label>Sobrenome</label>
                                            <input type="text" name="sobrenome" value="<?= $morador->getSobrenome() ?>" class="form-control" require />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Idade</label>
                                            <input type="number" name="idade" value="<?= $morador->getIdade() ?>" class="form-control" require />
                                        </div>
                                        <div class="col-md-3">
                                            <label>Sexo</label>
                                            <select name="sexo" class="form-control">
                                                <?php if ($morador->getSexo() == 'F') : ?>
                                                    <option value="F">Feminino</option>
                                                    <option value="M">Masculino</option>
                                                <?php else : ?>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Feminino</option>
                                                <?php endif ?>

                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Telefone</label>
                                            <input type="text" name="telefone" id="telefone" value="" class="form-control" require />
                                        </div>
                                        <div class="col-md-2">
                                            <label>Apartamento</label>
                                            <select name="idapartamento" class="form-control">
                                                <?php foreach ($unidadedao->read() as $unidade) : ?>
                                                    <option value="<?= $unidade->getId() ?>"><?= $unidade->getNumero() ?> - <?= $unidade->getBloco() ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <br>
                                            <input type="hidden" name="id" value="<?= $morador->getId() ?>" />
                                            <button class="btn btn-primary" type="submit" name="editar">Cadastrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>