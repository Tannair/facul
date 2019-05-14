<?php
include 'cabecalho.php';
$con = bancoMySqli();

$styleAfter = 'none';
$style = 'block';

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $rg = $_POST['rg'];

    $sql = "INSERT INTO clientes (nome, idade, rg) VALUES ('$nome', '$idade', '$rg')";

    if ($query = mysqli_query($con, $sql)) {
        $styleAfter = 'block';
        $style = 'none';
    }
}


?>

<div class="container">
    <div class="col-md-12 text-center">
        <div class="col-md-4 offset-4" id="cadastro" style="display: <?=$style?>">
            <form action="add_clientes.php" method="post" class="form-group">
                <div class="row text-center">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" class="form-control">
                    <br>
                    <label for="idade">Idade: </label>
                    <input type="number" name="idade" class="form-control">
                    <br>
                    <label for="rg">RG: </label>
                    <input type="number" name="rg" class="form-control">
                </div>
                <br>
                <div class="row">
                    <a href="index.php"><button type="button" class="btn btn-default"">Voltar</button></a>
                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success" style="margin-left: 199px;">
                </div>
            </form>
        </div>
        <div class="col-md-4 offset-4" id="afterCadastro" style="display: <?=$styleAfter?>">
            <h3 class="box-title">Cliente cadastrado com sucesso!</h3>
            <div class="row">
                <a href="index.php"><button type="button" class="btn btn-default"">Inicio</button></a>
                <button type="button" onclick="mostrarDiv('cadastro', 'afterCadastro')" style="margin-left: 199px;" class="btn btn-success">Adicionar</button>
            </div>
        </div>
    </div>
</div>

