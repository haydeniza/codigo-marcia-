<?php 
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cidade = $_POST["cidade"];

    // Evitar injeção de SQL usando prepared statements
    $query = "INSERT INTO teste (nome, cidade) VALUES (?, ?)";
    $stmt = mysqli_prepare($conect, $query);
    
    // Verificar se a preparação da consulta teve êxito
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $nome, $cidade);
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            echo '<script>alert("Cadastro realizado com sucesso!");</script>';
        } else {
            echo '<script>alert("Erro ao cadastrar. Por favor, tente novamente.");</script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Erro ao preparar a consulta.");</script>';
    }
}
?>

