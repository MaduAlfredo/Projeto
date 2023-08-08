<?php

include_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Consulta SQL para verificar se as credenciais estão corretas
    $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$senha'";
    $result = $conexao->query($sql);

    if ($result->num_rows == 1) {
        session_start();
        // Armazena o nome de usuário na sessão
        $_SESSION["email"] = $email;
        header("Location: ../html/teste.php");

    } else {
        // Caso contrário, mostre uma mensagem de erro
        echo "Usuário ou senha inválidos.";
    }
}

$conexao->close();
?>