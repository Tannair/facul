<?php
include 'cabecalho.php';
$con = bancoMySqli();

if (isset($_POST['editar'])) {
    $idUser = $_POST['id'];
    $sqlUsers = "SELECT * FROM usuarios WHERE id = '$idUser'";
    $queryUsers = mysqli_query($con, $sqlUsers);
    $users = mysqli_fetch_array($queryUsers);
}

if (isset($_POST['atualizar'])) {
    $idUser = $_POST['id'];
    $user = $_POST['user'];
    $senha = md5($_POST['senha']);

    $sql = "UPDATE usuarios SET 
                            usuario = '$user', 
                            senha = '$senha'
                            WHERE id = '$idUser'";

    if ($query = mysqli_query($con, $sql)) {
        $sqlUsers = "SELECT * FROM usuarios WHERE id = '$idUser'";
        $queryUsers = mysqli_query($con, $sqlUsers);
        $users = mysqli_fetch_array($queryUsers);

        $mensagem = "<h4>Usuario editado com sucesso!</h4>";
    }
}

if (isset($_POST['excluir'])) {
    $id = $_POST['id'];

    $sqlDelete = "DELETE FROM usuarios WHERE id = '$id'";

    if (mysqli_query($con, $sqlDelete)) {
        echo "<script>alert ('Usuario excluido com sucesso!'); 
                location.href = 'index.php'; </script>";
    }
}

?>

<div class="container">
    <div class="col-md-12 text-center">
        <div class="col-md-4 offset-4" id="cadastro">
            <div class="row" style="margin-left: 2%;">
                <?php if (isset($mensagem)) {
                    echo $mensagem;
                } else {
                    echo "<h2 style='margin-left: 32%'>Usuario</h2>";
                }; ?>
            </div>
            <form action="edita_user.php" method="post" class="form-group">
                <div class="row text-center">
                    <label for="user">Usuario: </label>
                    <input type="text" name="user" class="form-control" value="<?= $users['usuario']?>" >
                    <br>
                    <label for="senha">Senha: </label>
                    <input type="password" name="senha" class="form-control" placeholder="Protegido">
                </div>
                <br>
                <div class="row">
                    <a href="index.php"><button type="button" class="btn btn-default"">Voltar</button></a>
                    <input type="hidden" name="id" value="<?=$users['id']?>">
                    <input type="submit" name="atualizar" value="Editar" class="btn btn-success" style="margin-left: 199px;">
                </div>
            </form>
        </div>
    </div>
</div>

