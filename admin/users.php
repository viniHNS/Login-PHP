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
 
        $usuarios = buscar($connect, "usuarios", 1, "nome");
        

    ?>

    <div class="container mt-4">
        <div class="tabela">
            <table class='table table-striped table-hover'>
                <thead>
                    <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Nome</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>Data de aniversário</th>
                        <th scope='col'>Data de cadastro</th>
                        <th scope='col'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($usuarios as $usuario) {
                            echo "<tr>";
                            echo "<th scope='row'>{$usuario['id']}</th>";
                            echo "<td>{$usuario['nome']}</td>";
                            echo "<td>{$usuario['email']}</td>";
                            echo "<td>{$usuario['data_nascimento']}</td>";
                            echo "<td>{$usuario['data_cadastro']}</td>";
                            echo "<td><a class=\"btn btn-primary\" href=\"editUser.php?id={$usuario['id']}\" onclick=\"verifica()\"><i class=\"fa-solid fa-pencil\"></i></a></td>";
                            if($_SESSION['id'] != $usuario['id']){
                                echo "<td><a class=\"btn btn-danger\" href=\"deletar.php?id={$usuario['id']}\" onclick=\"verifica()\"><i class=\"fa-solid fa-trash\"></i></a></td>";
                            } else {
                                echo "<td><a class=\"btn btn-danger\" onclick=\"verificaErro()\"><i class=\"fa-solid fa-trash\"></i></a></td>";
                            }
                           
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://kit.fontawesome.com/62c44247f4.js" crossorigin="anonymous"></script>                       
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js-custom/script.js"></script>
</body>

</html>