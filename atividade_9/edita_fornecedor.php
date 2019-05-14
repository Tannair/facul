<?php
include 'cabecalho.php';
$con = bancoMySqli();

if (isset($_POST['editar'])) {
    $idFornecedor = $_POST['id'];
    $sqlFornecedor = "SELECT * FROM fornecedores WHERE id = '$idFornecedor'";
    $queryFornecedor = mysqli_query($con, $sqlFornecedor);
    $fornecedores = mysqli_fetch_array($queryFornecedor);
}

if (isset($_POST['atualizar'])) {
    $idFornecedor = $_POST['id'];
    $nome = $_POST['nome'];
    $end = $_POST['end'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE fornecedores SET 
                            nome = '$nome', 
                            endereco = '$end',  
                            telefone = '$telefone' 
                            WHERE id = '$idFornecedor'";

    if ($query = mysqli_query($con, $sql)) {
        $sqlFornecedor = "SELECT * FROM fornecedores WHERE id = '$idFornecedor'";
        $queryFornecedor = mysqli_query($con, $sqlFornecedor);
        $fornecedores = mysqli_fetch_array($queryFornecedor);

        $mensagem = "<h4>Fornecedor editado com sucesso!</h4>";
    }
}

if (isset($_POST['excluir'])) {
    $id = $_POST['id'];
    $sqlDelete = "DELETE FROM fornecedores WHERE id = '$id'";

    if (mysqli_query($con, $sqlDelete)) {
        echo "<script>alert ('Fornecedor excluido com sucesso!'); 
                location.href = 'index.php'; </script>";
    }
}


?>

<div class="container">
    <div class="col-md-12 text-center">
        <div class="col-md-4 offset-4" id="cadastro" style="display: <?=$style?>">
            <div class="row" align="center" style="margin-left: 2%;">

                <?php if (isset($mensagem)) {
                    echo $mensagem;
                } else {
                    echo "<h2 style='margin-left: 32%'>Fornecedor</h2>";
                }; ?>
            </div>
            <form action="edita_fornecedor.php" method="post" class="form-group">
                <div class="row text-center">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" class="form-control" value="<?=$fornecedores['nome']?>">
                    <br>
                    <label for="end">Endereco: </label>
                    <input type="text" name="end" class="form-control" value="<?=$fornecedores['endereco']?>">
                    <br>
                    <label for="telefone">Telefone: </label>
                    <input type="number" name="telefone" class="form-control" value="<?=$fornecedores['telefone']?>">
                </div>
                <br>
                <div class="row">
                    <a href="index.php"><button type="button" class="btn btn-default"">Voltar</button></a>
                    <input type="hidden" name="id" value="<?=$fornecedores['id']?>">
                    <input type="submit" name="atualizar" value="Editar" class="btn btn-success" style="margin-left: 199px;">
                </div>
            </form>
        </div>
    </div>
</div>

