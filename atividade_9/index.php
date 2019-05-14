<?php
include 'cabecalho.php';
$con = bancoMySqli();

$sqlClientes = "select * from clientes";
$queryClientes = mysqli_query($con, $sqlClientes);

$sqlFornecedores = "select * from fornecedores";
$queryFornecedores = mysqli_query($con, $sqlFornecedores);

$sqlUsers = "select * from usuarios";
$queryUsers = mysqli_query($con, $sqlUsers);


?>

<html>
<head>
    <title>Atividade 9</title>
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4 text-center">
                <button class="btn btn-info" onclick="mostrarDiv('clientes')">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;&nbsp;
                    Listar Clientes
                </button>
                <a href="add_clientes.php" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
                <div id="clientes" style="display: none;">
                    <hr>
                    <table class="table table-bordered table-bordered">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($clientes = mysqli_fetch_array($queryClientes)) {
                            ?>
                            <tr>
                                <td><?= $clientes['nome'] ?></td>
                                <td><?= $clientes['idade'] ?></td>
                                <td>
                                    <form action="edita_cliente.php" method="post">
                                        <input type="hidden" name="id" value="<?= $clientes['id'] ?>">
                                        <button type="submit" class="btn btn-warning" name="editar">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </button>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-danger" name="excluir">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <button onclick="mostrarDiv('fornecedores')" class="btn btn-info">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;&nbsp;
                     Listar Fornecedores
                </button>
                <a href="add_fornecedores.php" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
                <div id="fornecedores" style="display: none;">
                    <hr>
                    <table class="table table-bordered table-bordered">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($fornecedores = mysqli_fetch_array($queryFornecedores)) {
                            ?>
                            <tr>
                                <td><?= $fornecedores['nome'] ?></td>
                                <td><?= $fornecedores['telefone'] ?></td>
                                <td>
                                    <form action="edita_fornecedor.php" method="post">
                                        <input type="hidden" name="id" value="<?= $fornecedores['id'] ?>">
                                        <button type="submit" class="btn btn-warning" name="editar">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </button>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-danger" name="excluir">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <button onclick="mostrarDiv('usuarios')" class="btn btn-info">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;
                      Listar Usuarios
                </button>
                <a href="add_users.php" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
                <div id="usuarios" style="display: none;">
                    <hr>
                    <table class="table table-bordered table-bordered">
                        <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Data Cadastro</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($users = mysqli_fetch_array($queryUsers)) {
                            $timestamp = strtotime($users['data_cadastro']);
                            ?>
                            <tr>
                                <td><?= $users['usuario'] ?></td>
                                <td><?= date('d/m/Y  H:i:s' , $timestamp)?></td>
                                <td>
                                    <form action="edita_user.php" method="post">
                                        <input type="hidden" name="id" value="<?= $users['id'] ?>">
                                        <button type="submit" class="btn btn-warning" name="editar">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </button>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-danger" name="excluir">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

