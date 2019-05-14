<?php
include 'cabecalho.php';
$con = bancoMySqli();

if (isset($_POST['editar'])) {
    $idCliente = $_POST['id'];
    $sqlCliente = "SELECT * FROM clientes WHERE id = '$idCliente'";
    $queryClientes = mysqli_query($con, $sqlCliente);
    $clientes = mysqli_fetch_array($queryClientes);
}

if (isset($_POST['atualizar'])) {
    $idCliente = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $rg = $_POST['rg'];

    $sql = "UPDATE clientes SET 
                            nome = '$nome', 
                            idade = '$idade',  
                            rg = '$rg' 
                            WHERE id = '$idCliente'";

    if ($query = mysqli_query($con, $sql)) {
        $sqlCliente = "SELECT * FROM clientes WHERE id = '$idCliente'";
        $queryClientes = mysqli_query($con, $sqlCliente);
        $clientes = mysqli_fetch_array($queryClientes);

        $mensagem = "<h4>Cliente editado com sucesso!</h4> <hr>";
    }
}

if (isset($_POST['excluir'])) {
    $id = $_POST['id'];
    $sqlDelete = "DELETE FROM clientes WHERE id = '$id'";

    if (mysqli_query($con, $sqlDelete)) {
        echo "<script>alert ('Cliente excluido com sucesso!'); 
                location.href = 'index.php'; </script>";
    }
}

?>

<div class="container">
    <div class="col-md-12">
        <div class="col-md-4 offset-4" id="cadastro">
            <div class="row" style="margin-left: 2%">
                <?php if (isset($mensagem)) {
                    echo $mensagem . "<hr>";
                } else {
                    echo "<h2 style='margin-left: 32%'>Cliente</h2>";
                }; ?>
            </div>
            <form action="edita_cliente.php" method="post" class="form-group">
                <div class="row text-center">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" class="form-control" value="<?=$clientes['nome']?>" >
                    <br>
                    <label for="idade">Idade: </label>
                    <input type="number" name="idade" class="form-control" value="<?=$clientes['idade']?>">
                    <br>
                    <label for="rg">RG: </label>
                    <input type="number" name="rg" class="form-control" value="<?=$clientes['RG']?>">
                </div>
                <br>
                <div class="row">
                    <a href="index.php"><button type="button" class="btn btn-default"">Voltar</button></a>
                    <input type="hidden" name="id" value="<?=$clientes['id']?>">
                    <input type="submit" name="atualizar" value="Editar" class="btn btn-success" style="margin-left: 199px;">
                </div>
            </form>
        </div>
    </div>
</div>

