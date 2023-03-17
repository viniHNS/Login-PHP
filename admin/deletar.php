<?php 
    session_start();
    require_once "functions.php";
    if($_SESSION['id'] != $_GET['id']){
        deletar($connect, "usuarios", $_GET['id']);
        header("location: users.php");
    } else {
        echo "Você não pode deletar seu próprio usuário";
        header("location: users.php");
    }
    
?>