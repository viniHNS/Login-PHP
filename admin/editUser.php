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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js-custom/script.js"></script>
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
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $usuario = buscaUnica($connect, "usuarios", $id);
            updateUser($connect);
        }
    ?>
    
    <div class="container mt-4">
        <form action="" method="post">
            <div class="mt-3">
                <input value="<?php echo $usuario['id']; ?>" type="hidden" class="form-control" name="id" required>
                <label for="nome" class="form-label">Nome</label>
                <input value="<?php echo $usuario['nome']; ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
                <label for="email" class="form-label">E-Mail</label>
                <input value="<?php echo $usuario['email']; ?>" type="email" class="form-control" id="email" name="email" placeholder="Digite seu E-mail" required>
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
                <label for="repetesenha" class="form-label">Confirme sua senha</label>
                <input type="password" class="form-control" id="repetesenha" name="repetesenha" placeholder="Confirme sua senha">
                <label for="datanascimento">Data de Nascimento</label><br>
                <input value="<?php echo $usuario['data_nascimento']; ?>" class="mt-2" type="date" id="datanascimento" name="datanascimento">
                <br>
                <input class="btn btn-primary mt-4" type="submit" name="atualizar" value="Atualizar">
            </div>
        </form>
    </div>
    
    
    <script src="https://kit.fontawesome.com/62c44247f4.js" crossorigin="anonymous"></script>                       
    <script src="../js/bootstrap.bundle.min.js"></script>
    
    
</body>

</html>