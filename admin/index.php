<?php
session_start();
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


    <div class="container mt-4">
        <h3>Bem-vindo, <?php echo $_SESSION['nome']; ?></h3>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js-custom/script.js"></script>
</body>

</html>