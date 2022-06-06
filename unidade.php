<?php
include_once "./app/conexao/Conexao.php";
include_once "./app/dao/UnidadeDAO.php";
include_once "./app/model/Unidade.php";

//instancia as classes
$unidade = new Unidade();
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
</head>

<body>
<nav class="navbar navbar-light bg-light menu">
    <div class="container">
        <a class="navbar-brand" href="#">
            FLUXO CONDOMÍNIO - Cadastrar Unidade
        </a>
    </div>
</nav>
<div class="container">
    <form action="app/controller/UnidadeController.php" method="POST">
        <div class="row">
            <div class="col-md-3">
                <label>Numero</label>
                <input type="number" name="numero" value="<?= $unidade->getNumero() ?>" class="form-control" require />
            </div>
            <div class="col-md-3">
                <label>Bloco</label>
                <input type="text" name="bloco" maxlength="1" value="<?= $unidade->getBloco() ?>" class="form-control" require />
            </div>
            <div class="col-md-3">
                <label>Andar</label>
                <input type="number" name="andar" value="<?= $unidade->getAndar() ?>" class="form-control" require />
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
                <br>
                <input type="hidden" name="id" value="<?= $unidade->getId() ?>" />
                <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>
            </div>
            <div class="col-md-1">
                <br>
                <button class="btn btn-primary" type="submit" name="voltar">Voltar</button>
            </div>
        </div>
    </form>
    <hr>
    <div class="table-responsive">
        <table class="table table-sm table-bordered table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Numero</th>
                <th>Bloco</th>
                <th>Andar</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($unidadedao->read() as $unidade) : ?>
                <tr>
                    <td><?= $unidade->getId() ?></td>
                    <td><?= $unidade->getNumero() ?></td>
                    <td><?= $unidade->getBloco() ?></td>
                    <td><?= $unidade->getAndar() ?></td>
                    <td class="text-center">
                        <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $unidade->getId() ?>">
                            Editar
                        </button>
                        <a href="app/controller/UnidadeController.php?del=<?= $unidade->getId() ?>">
                            <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                        </a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="editar><?= $unidade->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="app/controller/UnidadeController.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Numero</label>
                                            <input type="number" name="numero" value="<?= $unidade->getNumero() ?>" class="form-control" require />
                                        </div>
                                        <div class="col-md-3">
                                            <label>Bloco</label>
                                            <input type="text" name="bloco" maxlength="1" value="<?= $unidade->getBloco() ?>" class="form-control" require />
                                        </div>
                                        <div class="col-md-3">
                                            <label>Andar</label>
                                            <input type="number" name="andar" value="<?= $unidade->getAndar() ?>" class="form-control" require />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                            <input type="hidden" name="id" value="<?= $unidade->getId() ?>" />
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