<?php
    session_start();
    require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css-custom/style.css">
    <title>Painel Admin</title>
</head>

<body>

    <?php
    if (!isset($_SESSION['ativa'])) {
        header("location: login.php");
    }
    ?>
  
    <?php include "../layout/navbar.php"; ?>

    <?php 
        inserirUsuario($connect);
    ?>

    <div class="container mt-4">
        <form action="" method="post">
            <div class="mt-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu E-mail">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
                <label for="repetesenha" class="form-label">Confirme sua senha</label>
                <input type="password" class="form-control" id="repetesenha" name="repetesenha" placeholder="Confirme sua senha">
                <label for="datanascimento">Data de Nascimento</label><br>
                <input class="mt-2" type="date" id="datanascimento" name="datanascimento">
                <br>
                <input class="btn btn-primary mt-4" type="submit" name="cadastrar" value="Cadastrar">
            </div>
        </form>
    </div>
    

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>