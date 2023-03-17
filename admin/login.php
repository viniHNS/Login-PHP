<?php require_once "functions.php";
if (isset($_POST['acessar'])) {
    login($connect);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css-custom/style.css">
</head>

<body>
    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Login</h5>
                            <p class="card-text">Faça o login para acessar o painel administrativo</p>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Informe seu E-mail">
                                </div>
                                <div class="mb-3">
                                    <label for="senha" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha">
                                </div>
                                <input class="btn btn-primary" type="submit" value="Acessar" name="acessar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>